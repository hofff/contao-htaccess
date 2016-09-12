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

namespace Bit3\Contao\Htaccess;

require_once TL_ROOT . '/system/config/htaccess.php';

use Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent;
use Bit3\StringBuilder\StringBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Htaccess
 *
 * Manage the .htaccess file
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class Htaccess
{
	/**
	 * @var Htaccess
	 */
	protected static $instance = null;

	/**
	 * @static
	 * @return Htaccess
	 */
	public static function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	public function update()
	{
		$event = new GenerateHtaccessEvent(new StringBuilder());

		/** @var EventDispatcher $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(HtaccessEvents::GENERATE, $event);

		$template           = new \BackendTemplate('htaccess_base');
		$template->htaccess = $event->getHtaccess();
		$htaccess           = $template->parse();

		$objFile = new \File('.htaccess');
		$objFile->write($htaccess);
		$objFile->close();

		\System::log('Create new .htaccess file.', 'Htaccess::update()', 'TL_INFO');

		if (TL_MODE == 'BE') {
			if (!isset($GLOBALS['TL_LANG']['tl_htaccess']['updateHtaccess'])) {
				\Controller::loadLanguageFile('tl_htaccess');
			}

			\Message::addConfirmation($GLOBALS['TL_LANG']['tl_htaccess']['updateHtaccess']);
		}
	}
}
