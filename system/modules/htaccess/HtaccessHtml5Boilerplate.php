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
 * Class HtaccessHtml5Boilerplate
 *
 * html5boilerplate features module.
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessHtml5Boilerplate implements HtaccessModule, HtaccessSubmodule
{
	/**
	 * Generate this module code.
	 *
	 * @return string
	 */
	public function generateModule($strSubmoduleCode)
	{
		$objTemplate = new BackendTemplate('htaccess_h5bp_features');
		$objTemplate->submodules            = $strSubmoduleCode;
		$objTemplate->disable_multiview     = $GLOBALS['TL_CONFIG']['htaccess_h5bp_disable_multiview'];
		$objTemplate->disable_indexes       = $GLOBALS['TL_CONFIG']['htaccess_h5bp_disable_indexes'];
		$objTemplate->concatenation_include = $GLOBALS['TL_CONFIG']['htaccess_h5bp_concatenation_include'];
		$objTemplate->ie_flicker_fix        = $GLOBALS['TL_CONFIG']['htaccess_h5bp_ie_flicker_fix'];
		return $objTemplate->parse();
	}

	/**
	 * Generate this sub module code.
	 *
	 * @return string
	 */
	public function generateSubmodule()
	{
		$objTemplate = new BackendTemplate('htaccess_h5bp_features_headers');
		$objTemplate->ie_x_ua_compatible = $GLOBALS['TL_CONFIG']['htaccess_h5bp_ie_x_ua_compatible'];
		$objTemplate->cross_domain_ajax  = $GLOBALS['TL_CONFIG']['htaccess_h5bp_cross_domain_ajax'];
		return $objTemplate->parse();
	}
}
