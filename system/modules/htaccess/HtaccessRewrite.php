<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * htaccess Generator
 * Copyright (C) 2011 Tristan Lins
 *
 * Extension for:
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    htaccess Generator
 * @license    LGPL
 * @filesource
 */


/**
 * Class HtaccessRewrite
 *
 * Rewrite htaccess configuration module.
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessRewrite extends System implements HtaccessModule
{
	/**
	 * Generate this module code.
	 *
	 * @return string
	 */
	public function generateModule($strSubmoduleCode)
	{
		$this->import('Database');

		$arrPrependWWW = array();
		$arrRemoveWWW = array();
		if ($GLOBALS['TL_CONFIG']['htaccess_rewrite_prepend_www']
			|| $GLOBALS['TL_CONFIG']['htaccess_rewrite_remove_www'])
		{
			$time = time();
			$objPage = $this->Database
				->prepare("SELECT * FROM tl_page
					WHERE type=? AND dns!=? AND published=?
					AND (start=? OR start<?) AND (stop=? OR stop>?)")
				->execute('root', '', 1, '', $time, '', $time);
			$arrDomains = $objPage->fetchEach('dns');

			if ($GLOBALS['TL_CONFIG']['htaccess_rewrite_prepend_www'])
			{
				foreach ($arrDomains as $strDomain)
				{
					if (preg_match('#^www\.(.+)$#', $strDomain, $arrMatch) && !in_array($arrMatch[1], $arrDomains))
					{
						$arrPrependWWW[] = $arrMatch[1];
					}
				}
			}
			if ($GLOBALS['TL_CONFIG']['htaccess_rewrite_remove_www'])
			{
				foreach ($arrDomains as $strDomain)
				{
					if (!preg_match('#^www\.(.+)$#', $strDomain) && !in_array('www.' . $strDomain, $arrDomains))
					{
						$arrRemoveWWW[] = $strDomain;
					}
				}
			}
		}

		$objTemplate = new BackendTemplate('htaccess_rewrite');
		$objTemplate->submodules = $strSubmoduleCode;
		$objTemplate->base       = $GLOBALS['TL_CONFIG']['websitePath'] ? $GLOBALS['TL_CONFIG']['websitePath'] : '/';
		$objTemplate->rules      = $GLOBALS['TL_CONFIG']['htaccess_rewrite_rules'];
		$objTemplate->prependWWW = $arrPrependWWW;
		$objTemplate->removeWWW  = $arrRemoveWWW;
		$objTemplate->dynamicWWW = $GLOBALS['TL_CONFIG']['htaccess_rewrite_dynamic_www'];
		$objTemplate->gzip       = $GLOBALS['TL_CONFIG']['htaccess_rewrite_gzip'];
		$objTemplate->suffix     = $GLOBALS['TL_CONFIG']['htaccess_rewrite_suffix'];
		return $objTemplate->parse();
	}
}
