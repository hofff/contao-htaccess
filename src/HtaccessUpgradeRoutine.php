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

use ContaoCommunityAlliance\DcGeneral\Contao\View\Contao2BackendView\IdSerializer;
use ContaoCommunityAlliance\DcGeneral\Event\PostPersistModelEvent;
use ContaoCommunityAlliance\DcGeneral\Event\PreEditModelEvent;
use ContaoCommunityAlliance\DcGeneral\Factory\Event\CreateDcGeneralEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class HtaccessUpgradeRoutine implements EventSubscriberInterface
{
	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			PreEditModelEvent::NAME . '[tl_htaccess]' => 'upgrade',
		);
	}

	public function upgrade(PreEditModelEvent $event)
	{
		$model      = $event->getModel();
		$properties = $model->getPropertiesAsArray();
		if (!isset($properties['htaccess_rewrite_domains_rules'])) {
			$rules = array();

			if (isset($properties['htaccess_rewrite_prepend_www']) && $properties['htaccess_rewrite_prepend_www']) {
				$domains = $this->getDomains();

				foreach ($domains as $domain) {
					if (preg_match('~^www\.~', $domain)) {
						$rules[] = array(
							'domain' => $domain,
							'www'    => 1,
							'https'  => '',
						);
					}
				}

				$model->setProperty('htaccess_rewrite_prepend_www', null);
			}
			if (isset($properties['htaccess_rewrite_remove_www']) && $properties['htaccess_rewrite_remove_www']) {
				$domains = $this->getDomains();

				foreach ($domains as $domain) {
					if (!preg_match('~^www\.~', $domain)) {
						$rules[] = array(
							'domain' => $domain,
							'www'    => 1,
							'https'  => '',
						);
					}
				}

				$model->setProperty('htaccess_rewrite_remove_www', null);
			}
			if (isset($properties['htaccess_rewrite_dynamic_www']) && $properties['htaccess_rewrite_dynamic_www']) {
				if ($properties['htaccess_rewrite_dynamic_www'] == 'prepend') {
					$domain = 'www.*';
				}
				else {
					$domain = '!www.*';
				}

				$rules[] = array(
					'domain' => $domain,
					'www'    => 1,
					'https'  => '',
				);

				$model->setProperty('htaccess_rewrite_dynamic_www', null);
			}

			$model->setProperty('htaccess_rewrite_domains_rules', $rules);
		}
	}

	protected function getDomains()
	{
		static $domains;

		if ($domains === null) {
			$domains = array();

			$pageCollection = \PageModel::findBy(array('type=? AND dns!=?'), array('root', ''));
			if ($pageCollection) {
				while ($pageCollection->next()) {
					$domains[] = $pageCollection->id;
				}
			}
		}

		return $domains;
	}
}
