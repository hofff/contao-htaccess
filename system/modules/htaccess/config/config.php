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
include(TL_ROOT . '/system/config/htaccess.php');


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
$GLOBALS['TL_HTACCESS']['h5bp']    = 'HtaccessHtml5Boilerplate';

$GLOBALS['TL_HTACCESS_SUBMODULES']['headers']['etag'] = 'HtaccessEtag';
$GLOBALS['TL_HTACCESS_SUBMODULES']['headers']['h5bp'] = 'HtaccessHtml5Boilerplate';


/**
 * Functions
 */
if (!function_exists('recalc_time_to_alternative'))
{
	/**
	 * Recalculate seconds to alternate interval syntax.
	 *
	 * @see http://httpd.apache.org/docs/2.0/mod/mod_expires.html#AltSyn
	 * @param $time int
	 * @return string
	 */
	function recalc_time_to_alternative($mode, $time)
	{
		$scope = 'seconds';
		$seconds = $time;
		$minutes = 0;
		$hours   = 0;
		$days    = 0;
		$weeks   = 0;
		$months  = 0;
		$years   = 0;
		if ($seconds >= 60)
		{
			$minutes  = $seconds / 60;
			$seconds %= 60;

			if ($minutes >= 60)
			{
				$hours    = $minutes / 60;
				$minutes %= 60;

				if ($hours >= 24)
				{
					$days   = $hours / 24;
					$hours %= 24;

					if ($days >= 7.5)
					{
						$weeks  = $days / 7.5;
						$days  %= 7.5;
						$hours -= ($weeks%2) * 12;
						$days  -= floor($weeks/2);

						if ($weeks >= 4)
						{
							$months  = $weeks / 4;
							$weeks  %= 4;

							if ($months >= 12)
							{
								$years   = $months / 12;
								$months %= 12;
							}
						}
					}
				}
			}
		}

		$buffer = '';
		if ($years > 1)
		{
			$buffer .= sprintf(' %d years', $years);
		}
		else if ($years > 0)
		{
			$buffer .= sprintf(' %d year', $years);
		}

		if ($months > 1)
		{
			$buffer .= sprintf(' %d months', $months);
		}
		else if ($months > 0)
		{
			$buffer .= sprintf(' %d month', $months);
		}

		if ($weeks > 1)
		{
			$buffer .= sprintf(' %d weeks', $weeks);
		}
		else if ($weeks > 0)
		{
			$buffer .= sprintf(' %d week', $weeks);
		}

		if ($days > 1)
		{
			$buffer .= sprintf(' %d days', $days);
		}
		else if ($days > 0)
		{
			$buffer .= sprintf(' %d day', $days);
		}

		if ($hours > 1)
		{
			$buffer .= sprintf(' %d hours', $hours);
		}
		else if ($hours > 0)
		{
			$buffer .= sprintf(' %d hour', $hours);
		}

		if ($minutes > 1)
		{
			$buffer .= sprintf(' %d minutes', $minutes);
		}
		else if ($minutes > 0)
		{
			$buffer .= sprintf(' %d minute', $minutes);
		}

		if ($seconds > 1 || empty($buffer))
		{
			$buffer .= sprintf(' %d seconds', $seconds);
		}
		if ($seconds > 0)
		{
			$buffer .= sprintf(' %d second', $seconds);
		}

		return sprintf('"%s plus %s"', $mode == 'A' ? 'access' : 'modification', trim($buffer));
	}
}


/**
 * Contao default configuration
 */
$GLOBALS['TL_HTACCESS_DEFAULTS']['contao'] = array
(
	/* base config */
	'htaccess_default_charset'     => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'        => true,
	/* mime config */
	'htaccess_mime_types'          => array
	(
		array('extension' => 'htc', 'mimetype' => 'text/x-component')
	),
	/* deflate config */
	'htaccess_deflate_files'       => array
	(
		array('extension' => 'css'),
		array('extension' => 'js'),
		array('extension' => 'xml'),
		array('extension' => 'html?'),
		array('extension' => 'php')
	),
	/* expires config */
	'htaccess_expires_default'     => (60*60*24*30),
	'htaccess_expires'             => array
	(
		array('mimetype' => 'image/png',                'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/gif',                'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/jpg',                'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/jpeg',               'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'text/javascript',          'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'application/x-javascript', 'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'application/javascript',   'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'text/css',                 'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/x-icon',             'mode' => 'A', 'time' => (60*60*24*30)),
	),
	/* custom config */
	'htaccess_custom'              => '',
	/* rewrite config */
	'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www' => false,
	'htaccess_rewrite_remove_www'  => false,
	'htaccess_rewrite_gzip'        => false,
	'htaccess_rewrite_suffix'      => 'html',
	/* h5bp settings */
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
	'htaccess_default_charset'     => 'utf-8',
	/* etag config */
	'htaccess_etag_disable'        => true,
	/* mime config */
	'htaccess_mime_types'          => array
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
	/* deflate config */
	'htaccess_deflate_files'       => array
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
	/* expires config */
	'htaccess_expires_default'     => (60*60*24*30),
	'htaccess_expires'             => array
	(
		array('mimetype' => 'text/cache-manifest',           'mode' => 'A', 'time' => 0),
		array('mimetype' => 'text/html',                     'mode' => 'A', 'time' => 0),
		array('mimetype' => 'text/xml',                      'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/xml',               'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/json',              'mode' => 'A', 'time' => 0),
		array('mimetype' => 'application/rss+xml',           'mode' => 'A', 'time' => (60*60)),
		array('mimetype' => 'application/atom+xml',          'mode' => 'A', 'time' => (60*60)),
		array('mimetype' => 'image/x-icon',                  'mode' => 'A', 'time' => (60*60*24*7.5)),
		array('mimetype' => 'image/gif',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/png',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/jpg',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/jpeg',                    'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'video/ogg',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'audio/ogg',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'video/mp4',                     'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'video/webm',                    'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'text/x-component',              'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'application/x-font-ttf',        'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'font/opentype',                 'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'application/x-font-woff',       'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'image/svg+xml',                 'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'application/vnd.ms-fontobject', 'mode' => 'A', 'time' => (60*60*24*30)),
		array('mimetype' => 'text/css',                      'mode' => 'A', 'time' => (60*60*24*30*12)),
		array('mimetype' => 'application/javascript',        'mode' => 'A', 'time' => (60*60*24*30*12)),
	),
	/* custom config */
	'htaccess_custom'              => '',
	/* rewrite config */
	'htaccess_rewrite_rules'       => '',
	'htaccess_rewrite_prepend_www' => false,
	'htaccess_rewrite_remove_www'  => false,
	'htaccess_rewrite_gzip'        => false,
	'htaccess_rewrite_suffix'      => 'html',
	/* h5bp settings */
	'htaccess_h5bp_ie_x_ua_compatible'    => false,
	'htaccess_h5bp_cross_domain_ajax'     => false,
	'htaccess_h5bp_concatenation_include' => false,
	'htaccess_h5bp_ie_flicker_fix'        => false
);
