<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Htaccess
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'htaccess_auth_basic'            => 'system/modules/htaccess/templates',
	'htaccess_auth_digest'           => 'system/modules/htaccess/templates',
	'htaccess_base'                  => 'system/modules/htaccess/templates',
	'htaccess_custom'                => 'system/modules/htaccess/templates',
	'htaccess_deflate'               => 'system/modules/htaccess/templates',
	'htaccess_etag'                  => 'system/modules/htaccess/templates',
	'htaccess_etag_headers'          => 'system/modules/htaccess/templates',
	'htaccess_expires'               => 'system/modules/htaccess/templates',
	'htaccess_expires_headers'       => 'system/modules/htaccess/templates',
	'htaccess_h5bp_features'         => 'system/modules/htaccess/templates',
	'htaccess_h5bp_features_headers' => 'system/modules/htaccess/templates',
	'htaccess_headers'               => 'system/modules/htaccess/templates',
	'htaccess_mime'                  => 'system/modules/htaccess/templates',
	'htaccess_rewrite'               => 'system/modules/htaccess/templates',
));
