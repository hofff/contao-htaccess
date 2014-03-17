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

use Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent;
use Bit3\Contao\Htaccess\Event\GenerateMimeEvent;
use Bit3\Contao\Htaccess\HtaccessEvents;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MimeGenerator implements EventSubscriberInterface
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

		$event = new GenerateMimeEvent(new \StringBuilder(), new \StringBuilder());

		/** @var EventDispatcher $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(HtaccessEvents::GENERATE_MIME, $event);

		$template            = new \BackendTemplate('htaccess_mime');
		$template->pre       = $event->getPre();
		$template->post      = $event->getPost();
		$template->mimetypes = deserialize($GLOBALS['TL_CONFIG']['htaccess_mime_types'], true);

		$htaccess->append(PHP_EOL);
		$htaccess->append($template->parse());
	}
}
