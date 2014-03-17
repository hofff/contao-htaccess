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

use Bit3\Contao\Htaccess\Event\GenerateHeadersEvent;
use Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent;
use Bit3\Contao\Htaccess\HtaccessEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EtagGenerator implements EventSubscriberInterface
{
	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			HtaccessEvents::GENERATE         => 'generate',
			HtaccessEvents::GENERATE_HEADERS => 'generateHeaders',
		);
	}

	public function generate(GenerateHtaccessEvent $event)
	{
		$htaccess = $event->getHtaccess();

		$template           = new \BackendTemplate('htaccess_etag');
		$template->disabled = $GLOBALS['TL_CONFIG']['htaccess_etag_disable'];

		$htaccess->append(PHP_EOL);
		$htaccess->append($template->parse());
	}

	public function generateHeaders(GenerateHeadersEvent $event)
	{
		$post = $event->getPost();

		$template           = new \BackendTemplate('htaccess_etag_headers');
		$template->disabled = $GLOBALS['TL_CONFIG']['htaccess_etag_disable'];

		$post->append(PHP_EOL);
		$post->append($template->parse());
	}
}
