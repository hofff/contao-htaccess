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
use Bit3\Contao\Htaccess\Event\GenerateRewritesEvent;
use Bit3\Contao\Htaccess\HtaccessEvents;
use Bit3\StringBuilder\StringBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RewriteGenerator implements EventSubscriberInterface
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

		$domains    = array();
		$wwwRules   = array();
		$httpsRules = array(
			'prevent' => array(),
			'enforce' => array(),
		);

		$pageCollection = \PageModel::findBy(array('type=? AND dns!=?'), array('root', ''));
		if ($pageCollection) {
			while ($pageCollection->next()) {
				$domains[$pageCollection->dns] = $pageCollection->dns;
			}
		}

		if (
			isset($GLOBALS['TL_CONFIG']['htaccess_rewrite_domains_rules'])
			&& is_array($GLOBALS['TL_CONFIG']['htaccess_rewrite_domains_rules'])
		) {
			foreach ($GLOBALS['TL_CONFIG']['htaccess_rewrite_domains_rules'] as $rule) {
				if ($rule['domain'] != 'www.*' && $rule['domain'] != '!www.*') {
					$page = \PageModel::findByPk($rule['domain']);

					if (!$page || !$page->dns) {
						continue;
					}

					$rule['domain'] = $page->dns;
				}

				if ($rule['www']) {
					$wwwRules[$rule['domain']] = $rule['domain'];
				}

				if ($rule['https']) {
					$httpsRules[$rule['https']][] = $rule['domain'];
				}
			}
		}

		$event = new GenerateRewritesEvent(new StringBuilder(), new StringBuilder());

		/** @var EventDispatcher $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(HtaccessEvents::GENERATE_REWRITES, $event);

		$template             = new \BackendTemplate('htaccess_rewrite');
		$template->pre        = $event->getPre();
		$template->post       = $event->getPost();
		$template->base       = $GLOBALS['TL_CONFIG']['websitePath'] ? $GLOBALS['TL_CONFIG']['websitePath'] : '/';
		$template->rules      = $GLOBALS['TL_CONFIG']['htaccess_rewrite_rules'];
		$template->domains    = $domains;
		$template->wwwRules   = $wwwRules;
		$template->httpsRules = $httpsRules;
		$template->gzip       = $GLOBALS['TL_CONFIG']['htaccess_rewrite_gzip'];
		$template->disabledFiles = $GLOBALS['TL_CONFIG']['htaccess_rewrite_disabled_files'];
		$template->suffix     = $GLOBALS['TL_CONFIG']['htaccess_rewrite_suffix'];

		$htaccess->append(PHP_EOL);
		$htaccess->append($template->parse());
	}
}
