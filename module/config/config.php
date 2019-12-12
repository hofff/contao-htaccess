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


/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['htaccess'] = array
(
	'tables' => array('tl_htaccess'),
	'icon'   => 'assets/htaccess/images/icon.png',
);

/**
 * Event subscribers
 */
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\DataContainer';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\HtaccessUpgradeRoutine';

$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\AuthGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\CustomGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\DeflateGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\EtagGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\ExpiresGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\HeadersGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\Html5BoilerplateGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\MimeGenerator';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Htaccess\Generator\RewriteGenerator';

/**
 * Allow .htusers on root level
 */
$GLOBALS['TL_CONFIG']['rootFiles'][] = '.htusers';

/**
 * syncCto blacklist entries
 */
$GLOBALS['SYC_CONFIG']['file_blacklist'] = array_merge(
	(array) $GLOBALS['SYC_CONFIG']['file_blacklist'],
	array(
		'system/config/htaccess*',
		'TL_ROOT/.htusers',
	)
);

/**
 * Default configuration
 */
$GLOBALS['TL_CONFIG']['htaccess_default_charset'] = 'utf-8';
$GLOBALS['TL_CONFIG']['htaccess_etag_disable']    = true;
$GLOBALS['TL_CONFIG']['htaccess_mime_types']      = array
(
	array(
		'extension' => 'js jsonp',
		'mimetype'  => 'application/javascript',
		'encoding'  => '',
	),
	array(
		'extension' => 'json',
		'mimetype'  => 'application/json',
		'encoding'  => '',
	),
	array(
		'extension' => 'oga ogg',
		'mimetype'  => 'audio/ogg',
		'encoding'  => '',
	),
	array(
		'extension' => 'm4a f4a f4b',
		'mimetype'  => 'audio/mp4',
		'encoding'  => '',
	),
	array(
		'extension' => 'ogv',
		'mimetype'  => 'video/ogg',
		'encoding'  => '',
	),
	array(
		'extension' => 'mp4 m4v f4v f4p',
		'mimetype'  => 'video/mp4',
		'encoding'  => '',
	),
	array(
		'extension' => 'webm',
		'mimetype'  => 'video/webm',
		'encoding'  => '',
	),
	array(
		'extension' => 'flv',
		'mimetype'  => 'video/x-flv',
		'encoding'  => '',
	),
	array(
		'extension' => 'svg svgz',
		'mimetype'  => 'image/svg+xml',
		'encoding'  => '',
	),
	array(
		'extension' => 'svgz',
		'mimetype'  => '',
		'encoding'  => 'gzip',
	),
	array(
		'extension' => 'eot',
		'mimetype'  => 'application/vnd.ms-fontobject',
		'encoding'  => '',
	),
	array(
		'extension' => 'ttf ttc',
		'mimetype'  => 'application/x-font-ttf',
		'encoding'  => '',
	),
	array(
		'extension' => 'otf',
		'mimetype'  => 'font/opentype',
		'encoding'  => '',
	),
	array(
		'extension' => 'woff',
		'mimetype'  => 'application/x-font-woff',
		'encoding'  => '',
	),
    array(
		'extension' => 'woff2',
		'mimetype'  => 'application/x-font-woff2',
		'encoding'  => '',
	),
	array(
		'extension' => 'ico',
		'mimetype'  => 'image/x-icon',
		'encoding'  => '',
	),
	array(
		'extension' => 'webp',
		'mimetype'  => 'image/webp',
		'encoding'  => '',
	),
	array(
		'extension' => 'appcache manifest',
		'mimetype'  => 'text/cache-manifest',
		'encoding'  => '',
	),
	array(
		'extension' => 'htc',
		'mimetype'  => 'text/x-component',
		'encoding'  => '',
	),
	array(
		'extension' => 'rss atom xml rdf',
		'mimetype'  => 'application/xml',
		'encoding'  => '',
	),
	array(
		'extension' => 'webapp',
		'mimetype'  => 'application/x-web-app-manifest+json',
		'encoding'  => '',
	),
	array(
		'extension' => 'vcf',
		'mimetype'  => 'text/x-vcard',
		'encoding'  => '',
	),
	array(
		'extension' => 'swf',
		'mimetype'  => 'application/x-shockwave-flash',
		'encoding'  => '',
	)
);

$GLOBALS['TL_CONFIG']['htaccess_deflate_files'] = array
(
	array('mimetype' => 'text/html'),
	array('mimetype' => 'text/css'),
	array('mimetype' => 'text/plain'),
	array('mimetype' => 'text/xml'),
	array('mimetype' => 'text/x-component'),
	array('mimetype' => 'application/javascript'),
	array('mimetype' => 'application/json'),
	array('mimetype' => 'application/xml'),
	array('mimetype' => 'application/xhtml+xml'),
	array('mimetype' => 'application/rss+xml'),
	array('mimetype' => 'application/atom+xml'),
	array('mimetype' => 'application/vnd.ms-fontobject'),
	array('mimetype' => 'image/svg+xml'),
	array('mimetype' => 'image/x-icon'),
	array('mimetype' => 'application/x-font-ttf'),
	array('mimetype' => 'font/opentype')
);

$GLOBALS['TL_CONFIG']['htaccess_expires_default'] = (60 * 60 * 24 * 30);
$GLOBALS['TL_CONFIG']['htaccess_expires']         = array
(
	array(
		'mimetype' => 'text/cache-manifest',
		'mode'     => 'A',
		'time'     => 0
	),
	array(
		'mimetype' => 'text/html',
		'mode'     => 'A',
		'time'     => 0
	),
	array(
		'mimetype' => 'text/xml',
		'mode'     => 'A',
		'time'     => 0
	),
	array(
		'mimetype' => 'application/xml',
		'mode'     => 'A',
		'time'     => 0
	),
	array(
		'mimetype' => 'application/json',
		'mode'     => 'A',
		'time'     => 0
	),
	array(
		'mimetype' => 'application/rss+xml',
		'mode'     => 'A',
		'time'     => (60 * 60)
	),
	array(
		'mimetype' => 'application/atom+xml',
		'mode'     => 'A',
		'time'     => (60 * 60)
	),
	array(
		'mimetype' => 'image/gif',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'image/png',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'image/jpg',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'image/jpeg',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'image/x-icon',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'video/ogg',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'audio/ogg',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'video/mp4',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'video/webm',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'text/x-component',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'application/x-font-ttf',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'font/opentype',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'application/x-font-woff',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'image/svg+xml',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'application/vnd.ms-fontobject',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30)
	),
	array(
		'mimetype' => 'text/css',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30 * 12)
	),
	array(
		'mimetype' => 'application/javascript',
		'mode'     => 'A',
		'time'     => (60 * 60 * 24 * 30 * 12)
	),
);

$GLOBALS['TL_CONFIG']['htaccess_custom'] = '';

$GLOBALS['TL_CONFIG']['htaccess_auth_enabled'] = '';

$GLOBALS['TL_CONFIG']['htaccess_rewrite_rules']                           = '';
$GLOBALS['TL_CONFIG']['htaccess_rewrite_gzip']                            = false;
$GLOBALS['TL_CONFIG']['htaccess_rewrite_disabled_files']                  = 'htm|php|js|css|htc|png|gif|jpe?g|ico|xml|csv|txt|swf|flv|mp4|webm|ogv|mp3|ogg|oga|eot|woff|woff2|svg|svgz|ttf|pdf|gz';
$GLOBALS['TL_CONFIG']['htaccess_rewrite_suffix']                          = 'html';
$GLOBALS['TL_CONFIG']['htaccess_allow_letsencrypt_bots']                  = false;
$GLOBALS['TL_CONFIG']['htaccess_redirect_to_home_when_calling_index_php'] = false;

$GLOBALS['TL_CONFIG']['htaccess_h5bp_disable_multiview']     = false;
$GLOBALS['TL_CONFIG']['htaccess_h5bp_disable_indexes']       = false;
$GLOBALS['TL_CONFIG']['htaccess_h5bp_ie_x_ua_compatible']    = false;
$GLOBALS['TL_CONFIG']['htaccess_h5bp_cross_domain_ajax']     = false;
$GLOBALS['TL_CONFIG']['htaccess_h5bp_concatenation_include'] = false;
$GLOBALS['TL_CONFIG']['htaccess_h5bp_ie_flicker_fix']        = false;
