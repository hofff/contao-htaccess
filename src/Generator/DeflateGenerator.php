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

namespace Bit3\Contao\Htaccess\Generator;

use Bit3\Contao\Htaccess\Event\GenerateDeflateEvent;
use Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent;
use Bit3\Contao\Htaccess\HtaccessEvents;
use Bit3\StringBuilder\StringBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DeflateGenerator implements EventSubscriberInterface
{
	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			HtaccessEvents::GENERATE => 'generate',
		);
	}

	public function generate(GenerateHtaccessEvent $event)
	{
		$htaccess = $event->getHtaccess();

		$deflate = array();
		foreach (deserialize($GLOBALS['TL_CONFIG']['htaccess_deflate_files'], true) as $arrFile) {
			if (!empty($arrFile['mimetype'])) {
				$deflate[] = $arrFile['mimetype'];
			}
		}

		$event = new GenerateDeflateEvent(new StringBuilder(), new StringBuilder());

		/** @var EventDispatcher $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(HtaccessEvents::GENERATE_DEFLATE, $event);

		$template            = new \BackendTemplate('htaccess_deflate');
		$template->pre       = $event->getPre();
		$template->post      = $event->getPost();
		$template->mimetypes = $deflate;

		$htaccess->append(PHP_EOL);
		$htaccess->append($template->parse());
	}
}
