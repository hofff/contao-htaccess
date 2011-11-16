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
 * Class Htaccess
 *
 * Manage the .htaccess file
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class Htaccess extends System
{
	public function update()
	{
		$strModules = '';

		// walk over modules
		foreach ($GLOBALS['TL_HTACCESS'] as $strModule=>$strClass)
		{
			// only generate if is it activated
			if ($GLOBALS['TL_CONFIG']['htaccess_module_' . $strModule])
			{
				/** @var HtaccessModule */
				$objModule = new $strClass();

				$strSubmoduleCode = '';

				// walk over sub modules if there any
				if (is_array($GLOBALS['TL_HTACCESS_SUBMODULES'][$strModule]))
				{
					foreach ($GLOBALS['TL_HTACCESS_SUBMODULES'] as $strSubmodule=>$strSubclass)
					{
						/** @var HtaccessSubmodule */
						$objSubmodule = new $strSubclass();

						// generate the sub module
						$strSubmoduleCode .= $objSubmodule->generateSubmodule();
					}
				}

				// generate the module
				$strModules .= $objModule->generateModule($strSubmoduleCode);
			}
		}

		$objTemplate = new BackendTemplate($GLOBALS['TL_CONFIG']['htaccess_template']);
		$objTemplate->modules = $strModules;
		$strHtaccess = $objTemplate->parse();
		
		$objFile = new File('.htaccess');
		$objFile->write($strHtaccess);
		$objFile->close();

		$this->log('Create new .htaccess file.', 'Htaccess::update()', TL_INFO);
	}
}
