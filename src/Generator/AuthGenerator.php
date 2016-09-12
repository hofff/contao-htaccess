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

use Bit3\Contao\Htaccess\Event\GenerateAuthEvent;
use Bit3\Contao\Htaccess\Event\GenerateHtaccessEvent;
use Bit3\Contao\Htaccess\HtaccessEvents;
use Bit3\StringBuilder\StringBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AuthGenerator implements EventSubscriberInterface
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

		$htusersFilename = '.htusers';

		$htusersFile = new \File($htusersFilename, true);

		if ($GLOBALS['TL_CONFIG']['htaccess_auth_enabled']) {
			if (
				$GLOBALS['TL_CONFIG']['htaccess_auth_mode'] != 'digest'
				&& $GLOBALS['TL_CONFIG']['htaccess_auth_mode'] != 'basic'
			) {
				$GLOBALS['TL_CONFIG']['htaccess_auth_mode'] = 'digest';
			}

			$authName = empty($GLOBALS['TL_CONFIG']['htaccess_auth_name'])
				? $GLOBALS['TL_CONFIG']['websiteTitle']
				: $GLOBALS['TL_CONFIG']['htaccess_auth_name'];

			$users = array();
			foreach (deserialize($GLOBALS['TL_CONFIG']['htaccess_auth_users'], true) as $user) {
				if (!empty($user['username']) && !empty($user['password'])) {
					$users[$user['username']] = \Encryption::decrypt($user['password']);
				}
			}

			$enabled = $GLOBALS['TL_CONFIG']['htaccess_auth_enabled'] && count($users);

			if ($enabled) {
				$htusersFile->truncate();

				foreach ($users as $username => $password) {
					switch ($GLOBALS['TL_CONFIG']['htaccess_auth_mode']) {
						case 'digest':
							$htusersFile->append(
								$username . ':' . $authName . ':' . md5($username . ':' . $authName . ':' . $password)
							);
							break;

						case 'basic':
							$htusersFile->append($username . ':' . crypt($password));
							break;
					}
				}
				
				$htusersFile->close();
			}
			else {
				$htusersFile->delete();
				return;
			}
		}
		else {
			$htusersFile->delete();
			return;
		}

		$event = new GenerateAuthEvent(new StringBuilder(), new StringBuilder());

		/** @var EventDispatcher $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(HtaccessEvents::GENERATE_AUTH, $event);

		$template          = new \BackendTemplate('htaccess_auth_' . $GLOBALS['TL_CONFIG']['htaccess_auth_mode']);
		$template->pre     = $event->getPre();
		$template->post    = $event->getPost();
		$template->enabled = $enabled;
		$template->name    = $authName;
		$template->users   = $users;
		$template->htusers = TL_ROOT . '/' . $htusersFilename;

		$htaccess->append(PHP_EOL);
		$htaccess->append($template->parse());
	}
}
