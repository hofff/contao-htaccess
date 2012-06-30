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
 * Little hack to workaround protected constructor of MyFavicon class.
 */
if (in_array('myfavicon', Config::getInstance()->getActiveModules())) {
	class HtaccessRewriteFaviconBase extends MyFavicon {}
}
else {
	class HtaccessRewriteFaviconBase {}
}

/**
 * Class HtaccessRewriteFavicon
 *
 * Favicon htaccess configuration module.
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessRewriteFavicon extends HtaccessRewriteFaviconBase implements HtaccessSubmodule
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Generate this sub module code.
	 *
	 * @return string
	 */
	public function generateSubmodule()
	{
		if ($GLOBALS['TL_CONFIG']['htaccess_rewrite_favicon']) {
			$arrFavicons = array();

			if (in_array('favicon', Config::getInstance()->getActiveModules())) {
				$objPage = Database::getInstance()
					->prepare('SELECT * FROM tl_page WHERE type=? AND faviconPath!=?')
					->execute('root', '');

				while ($objPage->next()) {
					if (file_exists(TL_ROOT . '/' . $objPage->faviconPath)) {
						$arrFavicons[$objPage->dns] = $objPage->faviconPath;
					}
				}
			}
			else if (in_array('myfavicon', Config::getInstance()->getActiveModules())) {
				$objPage = Database::getInstance()
					->prepare('SELECT * FROM tl_page WHERE type=? AND addFavicon=? AND favicon!=?')
					->execute('root', 1, '');

				while ($objPage->next()) {
					if (file_exists(TL_ROOT . '/' . $objPage->favicon)) {
						$this->createIcon($objPage->favicon, ($objPage->rootFavicon ? $objPage->alias : ''));

						foreach ($GLOBALS['TL_HEAD'] as $k=>$v) {
							if (preg_match('#rel="icon" type="image/vnd.microsoft.icon" href="(.*)"#', $v, $m)) {
								$arrFavicons[$objPage->dns] = $m[1];
								unset($GLOBALS['TL_HEAD'][$k]);
							}
							else if (preg_match('#rel="(apple-touch-icon|(shortcut )?icon)"#', $v)) {
								unset($GLOBALS['TL_HEAD'][$k]);
							}
						}
					}
				}
			}

			if (count($arrFavicons)) {
				uksort($arrFavicons, array($this, 'sortFavicons'));

				$objTemplate = new BackendTemplate('htaccess_rewrite_favicon');
				$objTemplate->favicons = $arrFavicons;
				return $objTemplate->parse();
			}
		}
		return '';
	}

	/**
	 * Sort favicons array by key.
	 *
	 * @param $a
	 * @param $b
	 * @return int
	 */
	public function sortFavicons($a, $b)
	{
		if ($a == '') {
			return 1;
		}
		else if ($b == '') {
			return -1;
		}
		else {
			return strcmp($a, $b);
		}
	}
}
