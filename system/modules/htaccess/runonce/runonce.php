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
 * Class HtaccessRunonce
 *
 * Handle version updates.
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessRunonce extends File
{
	/**
	 * @var string
	 */
	protected $extension;


	/**
	 * Create the runonce controller.
	 */
	public function __construct()
	{
		// overwrite File::__construct
		$this->import('HtaccessConfig', 'Config', true);
	}


	/**
	 * Magic method
	 */
	public function __get($strKey)
	{
		switch ($strKey)
		{
			case 'extension':
				return $this->extension;
		}

		return '';
	}

	/**
	 * Run the runonce controller
	 */
	public function run()
	{
		$this->loadLanguageFile('tl_htaccess');

		// add default charset if not exists
		if (!isset($GLOBALS['TL_CONFIG']['htaccess_default_charset']))
		{
			$this->Config->add("\$GLOBALS['TL_CONFIG']['htaccess_default_charset']", 'utf-8');
		}

		// rewrite deflate array key extension to key mimetype
		if (isset($GLOBALS['TL_CONFIG']['htaccess_deflate_files']))
		{
			$arrFiles = deserialize($GLOBALS['TL_CONFIG']['htaccess_deflate_files'], true);
			$arrTemp = array();
			foreach ($arrFiles as $arrFile)
			{
				if (isset($arrFile['extension']))
				{
					$this->extension = preg_replace('#[^\w]+#', '', $arrFile['extension']);
					$arrMime = $this->getMimeInfo();

					if ($arrMime[0] != 'application/octet-stream')
					{
						$arrTemp[] = array('mimetype' => $arrMime[0]);
					}
					else
					{
						$_SESSION['TL_ERROR'][] = sprintf($GLOBALS['TL_LANG']['tl_htaccess']['unknownType'], $arrFile['extension']);
					}
				}
				else if (isset($arrFile['mimetype']))
				{
					$arrTemp[] = $arrFile;
				}
			}
			$this->Config->add("\$GLOBALS['TL_CONFIG']['htaccess_deflate_files']", serialize($arrTemp));
		}
	}
}

$objRunonce = new HtaccessRunonce();
$objRunonce->run();
