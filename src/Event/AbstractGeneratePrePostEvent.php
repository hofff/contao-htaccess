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

use Bit3\StringBuilder\StringBuilder;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AbstractGeneratePrePostEvent
 */
abstract class AbstractGeneratePrePostEvent extends Event
{
	/**
	 * @var StringBuilder
	 */
	protected $pre;

	/**
	 * @var StringBuilder
	 */
	protected $post;

	function __construct(StringBuilder $pre, StringBuilder $post)
	{
		$this->pre  = $pre;
		$this->post = $post;
	}

	/**
	 * @param StringBuilder $pre
	 */
	public function setPre(StringBuilder $pre)
	{
		$this->pre = $pre;
		return $this;
	}

	/**
	 * @return StringBuilder
	 */
	public function getPre()
	{
		return $this->pre;
	}

	/**
	 * @param StringBuilder $post
	 */
	public function setPost(StringBuilder $post)
	{
		$this->post = $post;
		return $this;
	}

	/**
	 * @return StringBuilder
	 */
	public function getPost()
	{
		return $this->post;
	}
}
