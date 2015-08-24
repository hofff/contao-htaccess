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

/**
 * Class Htaccess
 *
 * Manage the .htaccess file
 *
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    htaccess Generator
 */
class DataContainer implements EventSubscriberInterface
{
	/**
	 * @var DataContainer
	 */
	static protected $instance;

	/**
	 * @return DataContainer
	 */
	static public function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}
		return self::$instance;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			CreateDcGeneralEvent::NAME => 'load',
			PreEditModelEvent::NAME => 'prepare',
			PostPersistModelEvent::NAME => 'update',
		);
	}

	public function __construct()
	{
		self::$instance = $this;
	}

	public function load(CreateDcGeneralEvent $event)
	{
		if('tl_htaccess' !== $event->getDcGeneral()->getEnvironment()->getDataDefinition()->getName()) {
			return;
		}

		$serializer = new IdSerializer();
		$serializer->setDataProviderName('tl_htaccess');
		$serializer->setId(1);

		$input = $event->getDcGeneral()->getEnvironment()->getInputProvider();
		$input->setParameter('id', $serializer->getSerialized());
	}

	public function prepare(PreEditModelEvent $event)
	{
		if('tl_htaccess' !== $event->getModel()->getProviderName()) {
			return;
		}

		// *** Hack around PHP require-cache ***
		// PHP will not directly reload the new generated file, so we reload the client
		// until PHP load the new file.
		if (isset($_SESSION['HTACCESS_FORCE_RELOAD']) && $_SESSION['HTACCESS_FORCE_RELOAD'] && isset($GLOBALS['TL_CONFIG']['htaccess_update_timestamp'])) {
			if ($GLOBALS['TL_CONFIG']['htaccess_update_timestamp'] >= $_SESSION['HTACCESS_FORCE_RELOAD']) {
				unset($_SESSION['HTACCESS_FORCE_RELOAD']);
			}
			else {
				sleep(1);
				\Backend::reload();
			}
		}

		$event->getModel()->setProperty('htaccess_update_timestamp', time());
	}

	/**
	 * @return void
	 */
	public function update(PostPersistModelEvent $event)
	{
		if('tl_htaccess' !== $event->getModel()->getProviderName()) {
			return;
		}

		$htaccess = Htaccess::getInstance();
		$htaccess->update();

		$_SESSION['HTACCESS_FORCE_RELOAD'] = $GLOBALS['TL_CONFIG']['htaccess_update_timestamp'];
	}

	public function updatePage($dc)
	{
		if (
			$dc->activeRecord->type == 'root' && (
				$GLOBALS['TL_CONFIG']['htaccess_rewrite_domain_rules']
			)
		) {
			$this->update();
		}
	}

	public function getDomainOptions()
	{
		$pageCollection = \PageModel::findBy(array('type=? AND dns!=?'), array('root', ''));
		$options        = array();

		if ($pageCollection) {
			while ($pageCollection->next()) {
				$options[$pageCollection->id] = sprintf('%s // %s', $pageCollection->dns, $pageCollection->title);
			}
		}

		$options['www.*'] = 'www.*';
		$options['!www.*']     = '!www.*';
		return $options;
	}

	public function loadTime($varValue)
	{
		return 'T' . $varValue;
	}

	public function saveTime($varValue)
	{
		return substr($varValue, 1);
	}
}
