<?php

/**
 * htaccess editor extension for the Contao Open Source CMS
 *
 * Copyright (C) 2013,2014 bit3 UG <http://bit3.de>
 *
 * @copyright (C) 2013,2014 bit3 UG
 * @author        Tristan Lins <tristan.lins@bit3.de>
 * @package       bit3/contao-htaccess
 * @license       LGPL-3.0+
 * @link          http://bit3.de
 */

namespace Bit3\Contao\Htaccess\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class GenerateHtaccessEvent
 */
class GenerateHtaccessEvent extends Event
{
	/**
	 * @var \StringBuilder
	 */
	protected $htaccess;

	function __construct(\StringBuilder $htaccess)
	{
		$this->htaccess = $htaccess;
	}

	/**
	 * @param \StringBuilder $htaccess
	 */
	public function setHtaccess(\StringBuilder $htaccess)
	{
		$this->htaccess = $htaccess;
		return $this;
	}

	/**
	 * @return \StringBuilder
	 */
	public function getHtaccess()
	{
		return $this->htaccess;
	}
}
