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
 * Class HtaccessAuth
 *
 * Auth htaccess configuration module.
 *
 * @copyright  Tristan Lins 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessAuth extends System implements HtaccessModule
{
	
	/**
	 * Generate this module code.
	 *
	 * @return string
	 */
	public function generateModule($strSubmoduleCode)
	{
		$strHtusers = '.htusers';

		$objFile = new File($strHtusers);

		if ($GLOBALS['TL_CONFIG']['htaccess_auth_enabled']) {
			$this->import('Encryption');

			if (   $GLOBALS['TL_CONFIG']['htaccess_auth_mode'] != 'digest'
				&& $GLOBALS['TL_CONFIG']['htaccess_auth_mode'] != 'basic')
			{
				$GLOBALS['TL_CONFIG']['htaccess_auth_mode'] = 'digest';
			}

			$strName = empty($GLOBALS['TL_CONFIG']['htaccess_auth_name']) ? $GLOBALS['TL_CONFIG']['websiteTitle'] : $GLOBALS['TL_CONFIG']['htaccess_auth_name'];

			$arrUsers = array();
			foreach (deserialize($GLOBALS['TL_CONFIG']['htaccess_auth_users'], true) as $arrUser)
			{
				if (!empty($arrUser['username']) && !empty($arrUser['password']))
				{
					$arrUsers[$arrUser['username']] = $this->Encryption->decrypt($arrUser['password']);
				}
			}

			$blnEnabled = $GLOBALS['TL_CONFIG']['htaccess_auth_enabled'] && count($arrUsers);

			if ($blnEnabled)
			{
				$objFile->truncate();

				foreach ($arrUsers as $strUsername=>$strPassword)
				{
					switch ($GLOBALS['TL_CONFIG']['htaccess_auth_mode'])
					{
						case 'digest':
							$objFile->append($strUsername . ':' . $strName . ':' . md5($strUsername . ':' . $strName . ':' . $strPassword));
							break;

						case 'basic':
							$objFile->append($strUsername . ':' . crypt($strPassword));
							break;
					}
				}
			}
			else
			{
				$objFile->delete();
				return '';
			}
		}
		else
		{
			$objFile->delete();
			return '';
		}

		$objTemplate = new BackendTemplate('htaccess_auth_' . $GLOBALS['TL_CONFIG']['htaccess_auth_mode']);
		$objTemplate->submodules = $strSubmoduleCode;
		$objTemplate->enabled    = $blnEnabled;
		$objTemplate->name       = $strName;
		$objTemplate->users      = $arrUsers;
		$objTemplate->htusers    = TL_ROOT . '/' . $strHtusers;
		return $objTemplate->parse();
	}
}
