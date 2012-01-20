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
 * Class HtaccessConfig
 *
 * Manage htaccess config fields.
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class HtaccessConfig extends Config
{
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;

	/**
	 * The Config object.
	 * @var Config
	 */
	protected $Config;

	/**
	 * Top content
	 * @var string
	 */
	protected $strHtaccessTop = '';

	/**
	 * Bottom content
	 * @var string
	 */
	protected $strHtaccessBottom = '';

	/**
	 * Modified
	 * @var boolean
	 */
	protected $blnHtaccessIsModified = false;

	/**
	 * Htaccess data array
	 * @var array
	 */
	protected $arrHtaccessData = array();


	/**
	 * Prevent direct instantiation (Singleton)
	 */
	protected function __construct() {
		$this->Config = Config::getInstance();
	}

	/**
	 * Save the local configuration
	 */
	public function __destruct()
	{
		if (!$this->blnHtaccessIsModified)
		{
			return;
		}

		$this->save();
	}


	/**
	 * Return the current object instance (Singleton)
	 * @return object
	 */
	public static function getInstance()
	{
		if (!is_object(self::$objInstance))
		{
			self::$objInstance = new HtaccessConfig();
			self::$objInstance->initialize();
		}

		return self::$objInstance;
	}

	/**
	 * Load all configuration files
	 */
	protected function initialize()
	{
		$strFile = TL_ROOT . '/system/config/htaccess.php';

		/**
		 * On new installations, the config file does not exists!
		 */
		if (!is_file($strFile)) {
			$this->strHtaccessTop = '<?php if (!defined(\'TL_ROOT\')) die(\'You can not access this file directly!\');

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
 */';
			$this->strHtaccessBottom = '?>';
			return;
		}

		// Read the htaccess configuration file
		$strMode = 'top';
		$resFile = fopen($strFile, 'rb');

		while (!feof($resFile))
		{
			$strLine = fgets($resFile);
			$strTrim = trim($strLine);

			if ($strTrim == '?>')
			{
				continue;
			}

			if ($strTrim == '### INSTALL SCRIPT START ###')
			{
				$strMode = 'data';
				continue;
			}

			if ($strTrim == '### INSTALL SCRIPT STOP ###')
			{
				$strMode = 'bottom';
				continue;
			}

			if ($strMode == 'top')
			{
				$this->strHtaccessTop .= $strLine;
			}
			elseif ($strMode == 'bottom')
			{
				$this->strHtaccessBottom .= $strLine;
			}
			elseif ($strTrim != '')
			{
				$arrChunks = array_map('trim', explode('=', $strLine, 2));
				$this->arrHtaccessData[$arrChunks[0]] = $arrChunks[1];

				// unescape values
				if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'(htaccess_[^\']+)\'\]$#', $arrChunks[0], $m))
				{
					$GLOBALS['TL_CONFIG'][$m[1]] = $this->unescape($GLOBALS['TL_CONFIG'][$m[1]]);
				}
			}
		}

		fclose($resFile);
	}


	/**
	 * Save the local configuration file
	 */
	public function save()
	{
		$strFile  = trim($this->strHtaccessTop) . "\n\n";
		$strFile .= "### INSTALL SCRIPT START ###\n";

		foreach ($this->arrHtaccessData as $k=>$v)
		{
			$strFile .= "$k = $v\n";
		}

		$strFile .= "### INSTALL SCRIPT STOP ###\n\n";
		$this->strHtaccessBottom = trim($this->strHtaccessBottom);

		if ($this->strHtaccessBottom != '')
		{
			$strFile .= $this->strHtaccessBottom . "\n\n";
		}

		$strFile .= '?>';
		$strTemp = md5(uniqid(mt_rand(), true));

		// Write to a temp file first
		$objFile = fopen(TL_ROOT . '/system/tmp/' . $strTemp, 'wb');
		fputs($objFile, $strFile);
		fclose($objFile);

		// Move current file
		$objFile = new File('system/config/htaccess.php');
		$this->Files->rename('system/config/htaccess.php', 'system/config/htaccess.' . $objFile->mtime . '.php');

		// Then move the file to its final destination
		$this->Files->rename('system/tmp/' . $strTemp, 'system/config/htaccess.php');
	}

	/**
	 * Add a configuration variable to the local configuration file
	 * @param string
	 * @param mixed
	 */
	public function add($strKey, $varValue)
	{
		if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'htaccess_[^\']+\'\]$#', $strKey))
		{
			$this->blnHtaccessIsModified = true;
			$this->Files = Files::getInstance(); // Required in the destructor
			$this->arrHtaccessData[$strKey] = $this->escape($varValue) . ';';
		}
		else
		{
			$this->Config->add($strKey, $varValue);
		}
	}

	/**
	 * Delete a configuration variable from the local configuration file
	 * @param string
	 * @param mixed
	 */
	public function delete($strKey)
	{
		if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'htaccess_[^\']+\'\]$#', $strKey))
		{
			$this->blnHtaccessIsModified = true;
			$this->Files = Files::getInstance(); // Required in the destructor
			unset($this->arrHtaccessData[$strKey]);
		}
		else
		{
			$this->Config->delete($strKey);
		}
	}

	public function escape($varValue)
	{
		return parent::escape(str_replace(array("\n", "\t"), array('\\n', '\\t'), $varValue));
	}

	public function unescape($varValue)
	{
		return str_replace(array('\\n', '\\t'), array("\n", "\t"), $varValue);
	}
}
