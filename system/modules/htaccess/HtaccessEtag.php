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
 * Class HtaccessEtag
 *
 * Etag htaccess configuration module.
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessEtag implements HtaccessModule, HtaccessSubmodule
{
	/**
	 * Generate this module code.
	 *
	 * @return string
	 */
	public function generateModule($strSubmoduleCode)
	{
		$objTemplate = new BackendTemplate('htaccess_etag_' . $GLOBALS['TL_CONFIG']['htaccess_template']);
		$objTemplate->submodules = $strSubmoduleCode;
		return $objTemplate->parse();
	}

	/**
	 * Generate this sub module code.
	 *
	 * @return string
	 */
	public function generateSubmodule()
	{
		$objTemplate = new BackendTemplate('htaccess_etag_headers_' . $GLOBALS['TL_CONFIG']['htaccess_template']);
		return $objTemplate->parse();
	}
}
