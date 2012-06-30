<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * htaccess Generator
 * Copyright (C) 2011 Tristan Lins
 *
 * Extension for:
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  InfinitySoft 2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    htaccess Generator
 * @license    LGPL
 * @filesource
 */


/**
 * Include htaccess config file.
 */
if (file_exists(TL_ROOT . '/system/config/htaccess.php')) {
	include(TL_ROOT . '/system/config/htaccess.php');
}


/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['htaccess'] = array
(
	'tables' => array('tl_htaccess'),
	'icon'   => 'system/modules/htaccess/html/icon.png',
);


/**
 * htaccess Modules
 */
$GLOBALS['TL_HTACCESS']['auth']    = 'HtaccessAuth';
$GLOBALS['TL_HTACCESS']['etag']    = 'HtaccessEtag';
$GLOBALS['TL_HTACCESS']['mime']    = 'HtaccessMime';
$GLOBALS['TL_HTACCESS']['deflate'] = 'HtaccessDeflate';
$GLOBALS['TL_HTACCESS']['headers'] = 'HtaccessHeaders';
$GLOBALS['TL_HTACCESS']['expires'] = 'HtaccessExpires';
$GLOBALS['TL_HTACCESS']['custom']  = 'HtaccessCustom';
$GLOBALS['TL_HTACCESS']['rewrite'] = 'HtaccessRewrite';
$GLOBALS['TL_HTACCESS']['h5bp']    = 'HtaccessHtml5Boilerplate';

$GLOBALS['TL_HTACCESS_SUBMODULES']['headers']['etag'] = 'HtaccessEtag';
$GLOBALS['TL_HTACCESS_SUBMODULES']['headers']['h5bp'] = 'HtaccessHtml5Boilerplate';

$GLOBALS['TL_HTACCESS_SUBMODULES']['rewrite']['favicon'] = 'HtaccessRewriteFavicon';


/**
 * Contao default configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['contao'] = array
(
	/* base config */
	'htaccess_default_charset'            => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'               => true,
	/* mime config */
	'htaccess_mime_types'                 => array
	(
		array('extension' => 'js jsonp',
		      'mimetype'  => 'application/javascript'),
		array('extension' => 'json',
		      'mimetype'  => 'application/json'),
		array('extension' => 'oga ogg',
		      'mimetype'  => 'audio/ogg'),
		array('extension' => 'm4a f4a f4b',
		      'mimetype'  => 'audio/mp4'),
		array('extension' => 'ogv',
		      'mimetype'  => 'video/ogg'),
		array('extension' => 'mp4 m4v f4v f4p',
		      'mimetype'  => 'video/mp4'),
		array('extension' => 'webm',
		      'mimetype'  => 'video/webm'),
		array('extension' => 'flv',
		      'mimetype'  => 'video/x-flv'),
		array('extension' => 'svg svgz',
		      'mimetype'  => 'image/svg+xml'),
		array('extension' => 'svgz',
		      'encoding'  => 'gzip'),
		array('extension' => 'eot',
		      'mimetype'  => 'application/vnd.ms-fontobject'),
		array('extension' => 'ttf ttc',
		      'mimetype'  => 'application/x-font-ttf'),
		array('extension' => 'otf',
		      'mimetype'  => 'font/opentype'),
		array('extension' => 'woff',
		      'mimetype'  => 'application/x-font-woff'),
		array('extension' => 'ico',
		      'mimetype'  => 'image/x-icon'),
		array('extension' => 'webp',
		      'mimetype'  => 'image/webp'),
		array('extension' => 'appcache manifest',
		      'mimetype'  => 'text/cache-manifest'),
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'rss atom xml rdf',
		      'mimetype'  => 'application/xml'),
		array('extension' => 'webapp',
		      'mimetype'  => 'application/x-web-app-manifest+json'),
		array('extension' => 'vcf',
		      'mimetype'  => 'text/x-vcard'),
		array('extension' => 'swf',
		      'mimetype'  => 'application/x-shockwave-flash')
	),
	/* deflate config */
	'htaccess_deflate_files'              => array
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
	),
	/* expires config */
	'htaccess_expires_default'            => (60 * 60 * 24 * 30),
	'htaccess_expires'                    => array
	(
		array('mimetype' => 'text/cache-manifest',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/html',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/json',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/rss+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60)),
		array('mimetype' => 'application/atom+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60)),
		array('mimetype' => 'image/gif',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/png',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/jpg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/jpeg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/x-icon',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/ogg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'audio/ogg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/mp4',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/webm',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'text/x-component',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/x-font-ttf',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'font/opentype',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/x-font-woff',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/svg+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/vnd.ms-fontobject',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'text/css',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30 * 12)),
		array('mimetype' => 'application/javascript',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30 * 12)),
	),
	/* custom config */
	// 'htaccess_custom'              => '',
	/* rewrite config */
	// 'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www'        => false,
	'htaccess_rewrite_remove_www'         => false,
	'htaccess_rewrite_gzip'               => false,
	'htaccess_rewrite_suffix'             => 'html',
	/* h5bp settings */
	'htaccess_h5bp_disable_multiview'     => false,
	'htaccess_h5bp_disable_indexes'       => false,
	'htaccess_h5bp_ie_x_ua_compatible'    => false,
	'htaccess_h5bp_cross_domain_ajax'     => false,
	'htaccess_h5bp_concatenation_include' => false,
	'htaccess_h5bp_ie_flicker_fix'        => false
);


/**
 * Contao development configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['contao development'] = array
(
	/* base config */
	'htaccess_default_charset'            => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'               => true,
	/* mime config */
	'htaccess_mime_types'                 => array
	(
		array('extension' => 'js jsonp',
		      'mimetype'  => 'application/javascript'),
		array('extension' => 'json',
		      'mimetype'  => 'application/json'),
		array('extension' => 'oga ogg',
		      'mimetype'  => 'audio/ogg'),
		array('extension' => 'm4a f4a f4b',
		      'mimetype'  => 'audio/mp4'),
		array('extension' => 'ogv',
		      'mimetype'  => 'video/ogg'),
		array('extension' => 'mp4 m4v f4v f4p',
		      'mimetype'  => 'video/mp4'),
		array('extension' => 'webm',
		      'mimetype'  => 'video/webm'),
		array('extension' => 'flv',
		      'mimetype'  => 'video/x-flv'),
		array('extension' => 'svg svgz',
		      'mimetype'  => 'image/svg+xml'),
		array('extension' => 'svgz',
		      'encoding'  => 'gzip'),
		array('extension' => 'eot',
		      'mimetype'  => 'application/vnd.ms-fontobject'),
		array('extension' => 'ttf ttc',
		      'mimetype'  => 'application/x-font-ttf'),
		array('extension' => 'otf',
		      'mimetype'  => 'font/opentype'),
		array('extension' => 'woff',
		      'mimetype'  => 'application/x-font-woff'),
		array('extension' => 'ico',
		      'mimetype'  => 'image/x-icon'),
		array('extension' => 'webp',
		      'mimetype'  => 'image/webp'),
		array('extension' => 'appcache manifest',
		      'mimetype'  => 'text/cache-manifest'),
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'rss atom xml rdf',
		      'mimetype'  => 'application/xml'),
		array('extension' => 'webapp',
		      'mimetype'  => 'application/x-web-app-manifest+json'),
		array('extension' => 'vcf',
		      'mimetype'  => 'text/x-vcard'),
		array('extension' => 'swf',
		      'mimetype'  => 'application/x-shockwave-flash')
	),
	/* deflate config */
	'htaccess_deflate_files'              => array
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
	),
	/* expires config */
	'htaccess_expires_default'            => 0,
	'htaccess_expires'                    => array
	(
		array('mimetype' => 'text/cache-manifest',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/html',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/json',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/rss+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/atom+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/gif',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/png',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/jpg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/jpeg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/x-icon',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/ogg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'audio/ogg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/mp4',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/webm',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/x-component',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/x-font-ttf',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'font/opentype',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/x-font-woff',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/svg+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/vnd.ms-fontobject',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/css',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/javascript',
		      'mode'     => 'A',
		      'time'     => 0),
	),
	/* custom config */
	// 'htaccess_custom'              => '',
	/* rewrite config */
	// 'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www'        => false,
	'htaccess_rewrite_remove_www'         => false,
	'htaccess_rewrite_gzip'               => false,
	'htaccess_rewrite_suffix'             => 'html',
	/* h5bp settings */
	'htaccess_h5bp_disable_multiview'     => false,
	'htaccess_h5bp_disable_indexes'       => false,
	'htaccess_h5bp_ie_x_ua_compatible'    => false,
	'htaccess_h5bp_cross_domain_ajax'     => false,
	'htaccess_h5bp_concatenation_include' => false,
	'htaccess_h5bp_ie_flicker_fix'        => false
);


/**
 * HTML5 Boilerplate default configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['html5boilerplate'] = array
(
	/* base config */
	'htaccess_default_charset'            => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'               => true,
	/* mime config */
	'htaccess_mime_types'                 => array
	(
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'js',
		      'mimetype'  => 'application/javascript'),
		array('extension' => 'oga ogg',
		      'mimetype'  => 'audio/ogg'),
		array('extension' => 'm4a',
		      'mimetype'  => 'audio/mp4'),
		array('extension' => 'ogv',
		      'mimetype'  => 'video/ogg'),
		array('extension' => 'mp4 m4v',
		      'mimetype'  => 'video/mp4'),
		array('extension' => 'webm',
		      'mimetype'  => 'video/webm'),
		array('extension' => 'svg svgz',
		      'mimetype'  => 'image/svg+xml'),
		array('extension' => 'svgz',
		      'encoding'  => 'gzip'),
		array('extension' => 'eot',
		      'mimetype'  => 'application/vnd.ms-fontobject'),
		array('extension' => 'ttf ttc',
		      'mimetype'  => 'application/x-font-ttf'),
		array('extension' => 'otf',
		      'mimetype'  => 'font/opentype'),
		array('extension' => 'woff',
		      'mimetype'  => 'application/x-font-woff'),
		array('extension' => 'ico',
		      'mimetype'  => 'image/x-icon'),
		array('extension' => 'webp',
		      'mimetype'  => 'image/webp'),
		array('extension' => 'appcache manifest',
		      'mimetype'  => 'text/cache-manifest'),
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'crx',
		      'mimetype'  => 'application/x-chrome-extension'),
		array('extension' => 'oex',
		      'mimetype'  => 'application/x-opera-extension'),
		array('extension' => 'xpi',
		      'mimetype'  => 'application/x-xpinstall'),
		array('extension' => 'safariextz',
		      'mimetype'  => 'application/octet-stream'),
		array('extension' => 'vcf',
		      'mimetype'  => 'text/x-vcard')
	),
	/* deflate config */
	'htaccess_deflate_files'              => array
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
	),
	/* expires config */
	'htaccess_expires_default'            => (60 * 60 * 24 * 30),
	'htaccess_expires'                    => array
	(
		array('mimetype' => 'text/cache-manifest',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/html',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/json',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/rss+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60)),
		array('mimetype' => 'application/atom+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60)),
		array('mimetype' => 'image/x-icon',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 7.5)),
		array('mimetype' => 'image/gif',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/png',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/jpg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/jpeg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/ogg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'audio/ogg',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/mp4',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'video/webm',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'text/x-component',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/x-font-ttf',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'font/opentype',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/x-font-woff',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'image/svg+xml',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'application/vnd.ms-fontobject',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30)),
		array('mimetype' => 'text/css',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30 * 12)),
		array('mimetype' => 'application/javascript',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 30 * 12)),
	),
	/* custom config */
	// 'htaccess_custom'              => '',
	/* rewrite config */
	// 'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www'        => false,
	'htaccess_rewrite_remove_www'         => false,
	'htaccess_rewrite_gzip'               => false,
	'htaccess_rewrite_suffix'             => 'html',
	/* h5bp settings */
	'htaccess_h5bp_disable_multiview'     => true,
	'htaccess_h5bp_disable_indexes'       => true,
	'htaccess_h5bp_ie_x_ua_compatible'    => false,
	'htaccess_h5bp_cross_domain_ajax'     => false,
	'htaccess_h5bp_concatenation_include' => false,
	'htaccess_h5bp_ie_flicker_fix'        => false
);


/**
 * HTML5 Boilerplate developer configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['html5boilerplate development'] = array
(
	/* base config */
	'htaccess_default_charset'            => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'               => true,
	/* mime config */
	'htaccess_mime_types'                 => array
	(
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'js',
		      'mimetype'  => 'application/javascript'),
		array('extension' => 'oga ogg',
		      'mimetype'  => 'audio/ogg'),
		array('extension' => 'm4a',
		      'mimetype'  => 'audio/mp4'),
		array('extension' => 'ogv',
		      'mimetype'  => 'video/ogg'),
		array('extension' => 'mp4 m4v',
		      'mimetype'  => 'video/mp4'),
		array('extension' => 'webm',
		      'mimetype'  => 'video/webm'),
		array('extension' => 'svg svgz',
		      'mimetype'  => 'image/svg+xml'),
		array('extension' => 'svgz',
		      'encoding'  => 'gzip'),
		array('extension' => 'eot',
		      'mimetype'  => 'application/vnd.ms-fontobject'),
		array('extension' => 'ttf ttc',
		      'mimetype'  => 'application/x-font-ttf'),
		array('extension' => 'otf',
		      'mimetype'  => 'font/opentype'),
		array('extension' => 'woff',
		      'mimetype'  => 'application/x-font-woff'),
		array('extension' => 'ico',
		      'mimetype'  => 'image/x-icon'),
		array('extension' => 'webp',
		      'mimetype'  => 'image/webp'),
		array('extension' => 'appcache manifest',
		      'mimetype'  => 'text/cache-manifest'),
		array('extension' => 'htc',
		      'mimetype'  => 'text/x-component'),
		array('extension' => 'crx',
		      'mimetype'  => 'application/x-chrome-extension'),
		array('extension' => 'oex',
		      'mimetype'  => 'application/x-opera-extension'),
		array('extension' => 'xpi',
		      'mimetype'  => 'application/x-xpinstall'),
		array('extension' => 'safariextz',
		      'mimetype'  => 'application/octet-stream'),
		array('extension' => 'vcf',
		      'mimetype'  => 'text/x-vcard')
	),
	/* deflate config */
	'htaccess_deflate_files'              => array
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
	),
	/* expires config */
	'htaccess_expires_default'            => 0,
	'htaccess_expires'                    => array
	(
		array('mimetype' => 'text/cache-manifest',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/html',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/json',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/rss+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/atom+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/x-icon',
		      'mode'     => 'A',
		      'time'     => (60 * 60 * 24 * 7.5)),
		array('mimetype' => 'image/gif',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/png',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/jpg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/jpeg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/ogg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'audio/ogg',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/mp4',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'video/webm',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/x-component',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/x-font-ttf',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'font/opentype',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/x-font-woff',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'image/svg+xml',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/vnd.ms-fontobject',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'text/css',
		      'mode'     => 'A',
		      'time'     => 0),
		array('mimetype' => 'application/javascript',
		      'mode'     => 'A',
		      'time'     => 0),
	),
	/* custom config */
	// 'htaccess_custom'              => '',
	/* rewrite config */
	// 'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www'        => false,
	'htaccess_rewrite_remove_www'         => false,
	'htaccess_rewrite_gzip'               => false,
	'htaccess_rewrite_suffix'             => 'html',
	/* h5bp settings */
	'htaccess_h5bp_disable_multiview'     => true,
	'htaccess_h5bp_disable_indexes'       => true,
	'htaccess_h5bp_ie_x_ua_compatible'    => false,
	'htaccess_h5bp_cross_domain_ajax'     => false,
	'htaccess_h5bp_concatenation_include' => false,
	'htaccess_h5bp_ie_flicker_fix'        => false
);
