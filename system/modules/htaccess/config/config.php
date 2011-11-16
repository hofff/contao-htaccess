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
$GLOBALS['TL_HTACCESS']['etag']    = 'HtaccessEtag';
$GLOBALS['TL_HTACCESS']['mime']    = 'HtaccessMime';
$GLOBALS['TL_HTACCESS']['deflate'] = 'HtaccessDeflate';
$GLOBALS['TL_HTACCESS']['headers'] = 'HtaccessHeaders';
$GLOBALS['TL_HTACCESS']['expires'] = 'HtaccessExpires';
$GLOBALS['TL_HTACCESS']['custom']  = 'HtaccessCustom';
$GLOBALS['TL_HTACCESS']['rewrite'] = 'HtaccessRewrite';

$GLOBALS['TL_HTACCESS_SUBMODULES']['headers'] = 'HtaccessEtag';


/**
 * Contao default configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['contao'] = array
(
	'htaccess_template' => 'htaccess_base_contao',
	/* etag config */
	'htaccess_module_etag'           => true,
	'htaccess_etag_template'         => 'htaccess_etag_contao',
	'htaccess_etag_headers_template' => 'htaccess_etag_headers_contao',
	/* mime config */
	'htaccess_module_mime'   => true,
	'htaccess_mime_types'    => array
	(
		array('extension' => 'htc', 'mimetype' => 'text/x-component')
	),
	'htaccess_mime_template' => 'htaccess_mime_contao',
	/* deflate config */
	'htaccess_module_deflate'   => true,
	'htaccess_deflate_files'    => array
	(
		array('extension' => 'css'),
		array('extension' => 'js'),
		array('extension' => 'xml'),
		array('extension' => 'html?'),
		array('extension' => 'php')
	),
	'htaccess_deflate_template' => 'htaccess_deflate_contao',
	/* headers config */
	'htaccess_module_headers'   => true,
	'htaccess_headers_template' => 'htaccess_headers_contao',
	/* expires config */
	'htaccess_module_expires'   => true,
	'htaccess_expires_default'  => 2592000,
	'htaccess_expires'          => array
	(
		array('mimetype' => 'image/png',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/gif',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/jpg',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/jpeg',               'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'text/javascript',          'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'application/x-javascript', 'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'application/javascript',   'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'text/css',                 'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/x-icon',             'mode' => 'A', 'time' => 2592000),
	),
	'htaccess_expires_template' => 'htaccess_expires_contao',
	/* custom config */
	'htaccess_module_custom' => false,
	/* rewrite config */
	'htaccess_module_rewrite' => true,
	'htaccess_rewrite_template' => 'htaccess_rewrite_contao'
);

/**
 * HTML5 Boilerplate default configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['html5boilerplate'] = array
(
	'htaccess_template' => 'htaccess_base_h5bp',
	/* etag config */
	'htaccess_module_etag' => true,
	'htaccess_etag_template'         => 'htaccess_etag_h5bp',
	'htaccess_etag_headers_template' => 'htaccess_etag_headers_h5bp',
	/* mime config */
	'htaccess_module_mime' => true,
	'htaccess_mime_types' => array
	(
		array('extension' => 'htc',               'mimetype' => 'text/x-component'),
		array('extension' => 'js',                'mimetype' => 'application/javascript'),
		array('extension' => 'oga ogg',           'mimetype' => 'audio/ogg'),
		array('extension' => 'm4a',               'mimetype' => 'audio/mp4'),
		array('extension' => 'ogv',               'mimetype' => 'video/ogg'),
		array('extension' => 'mp4 m4v',           'mimetype' => 'video/mp4'),
		array('extension' => 'webm',              'mimetype' => 'video/webm'),
		array('extension' => 'svg svgz',          'mimetype' => 'image/svg+xml'),
		array('extension' => 'svgz',              'encoding' => 'gzip'),
		array('extension' => 'eot',               'mimetype' => 'application/vnd.ms-fontobject'),
		array('extension' => 'ttf ttc',           'mimetype' => 'application/x-font-ttf'),
		array('extension' => 'otf',               'mimetype' => 'font/opentype'),
		array('extension' => 'woff',              'mimetype' => 'application/x-font-woff'),
		array('extension' => 'ico',               'mimetype' => 'image/x-icon'),
		array('extension' => 'webp',              'mimetype' => 'image/webp'),
		array('extension' => 'appcache manifest', 'mimetype' => 'text/cache-manifest'),
		array('extension' => 'htc',               'mimetype' => 'text/x-component'),
		array('extension' => 'crx',               'mimetype' => 'application/x-chrome-extension'),
		array('extension' => 'oex',               'mimetype' => 'application/x-opera-extension'),
		array('extension' => 'xpi',               'mimetype' => 'application/x-xpinstall'),
		array('extension' => 'safariextz',        'mimetype' => 'application/octet-stream'),
		array('extension' => 'vcf',               'mimetype' => 'text/x-vcard')
	),
	'htaccess_mime_template' => 'htaccess_mime_contao',
	/* deflate config */
	'htaccess_module_deflate'   => true,
	'htaccess_deflate_files'    => array
	(
		array('extension' => 'text/html'),
		array('extension' => 'text/css'),
		array('extension' => 'text/plain'),
		array('extension' => 'text/xml'),
		array('extension' => 'text/x-component'),
		array('extension' => 'application/javascript'),
		array('extension' => 'application/json'),
		array('extension' => 'application/xml'),
		array('extension' => 'application/xhtml+xml'),
		array('extension' => 'application/rss+xml'),
		array('extension' => 'application/atom+xml'),
		array('extension' => 'application/vnd.ms-fontobject'),
		array('extension' => 'image/svg+xml'),
		array('extension' => 'image/x-icon'),
		array('extension' => 'application/x-font-ttf'),
		array('extension' => 'font/opentype')
	),
	'htaccess_deflate_template' => 'htaccess_deflate_h5bp',
	/* headers config */
	'htaccess_module_headers'   => true,
	'htaccess_headers_template' => 'htaccess_headers_h5bp',
	/* expires config */
	'htaccess_module_expires'   => true,
	'htaccess_expires_default'  => 2592000,
	'htaccess_expires'          => array
	(
		array('mimetype' => 'text/cache-manifest',                'mode' => 'A', 'time' => 0),
		array('mimetype' => 'text/html',                'mode' => 'A', 'time' => 0),
		array('mimetype' => 'text/xml',                'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/xml',                'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/json',                'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/rss+xml',                'mode' => 'A', 'time' => 3600),
		array('mimetype' => 'application/atom+xml',                'mode' => 'A', 'time' => 3600),
		array('mimetype' => 'image/x-icon',                'mode' => 'A', 'time' => 604800),
		array('mimetype' => 'image/gif',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/png',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/jpg',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/jpeg',               'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'video/ogg',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'audio/ogg',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'video/mp4',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'video/webm',               'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'text/x-component',               'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'application/x-font-ttf',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'font/opentype',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'application/x-font-woff',                'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'image/svg+xml',               'mode' => 'A', 'time' => 2592000),
		array('mimetype' => 'application/vnd.ms-fontobject',               'mode' => 'A', 'time' => 2592000),

		array('mimetype' => 'text/css',                 'mode' => 'A', 'time' => 31104000),
		array('mimetype' => 'application/javascript',             'mode' => 'A', 'time' => 31104000),
	),
	'htaccess_expires_template' => 'htaccess_expires_h5bp',
	/* custom config */
	'htaccess_module_custom' => false,
	/* rewrite config */
	'htaccess_module_rewrite'   => true,
	'htaccess_rewrite_template' => 'htaccess_rewrite_h5bp'
);
