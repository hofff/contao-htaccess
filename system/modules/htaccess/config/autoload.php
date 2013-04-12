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
 * Register the classes
 */
ClassLoader::addClasses(array
(
    'DC_File_Htaccess'         => 'system/drivers/DC_File_Htaccess.php',
	'HtaccessAuth'             => 'system/modules/htaccess/HtaccessAuth.php',
	'HtaccessMime'             => 'system/modules/htaccess/HtaccessMime.php',
	'HtaccessEtag'             => 'system/modules/htaccess/HtaccessEtag.php',
	'HtaccessRewriteFavicon'   => 'system/modules/htaccess/HtaccessRewriteFavicon.php',
	'HtaccessRewrite'          => 'system/modules/htaccess/HtaccessRewrite.php',
	'HtaccessCustom'           => 'system/modules/htaccess/HtaccessCustom.php',
	'HtaccessModule'           => 'system/modules/htaccess/HtaccessModule.php',
    'HtaccessSubmodule'        => 'system/modules/htaccess/HtaccessSubmodule.php',
	'HtaccessDeflate'          => 'system/modules/htaccess/HtaccessDeflate.php',
	'HtaccessHeaders'          => 'system/modules/htaccess/HtaccessHeaders.php',
	'Htaccess'                 => 'system/modules/htaccess/Htaccess.php',
	'HtaccessHtml5Boilerplate' => 'system/modules/htaccess/HtaccessHtml5Boilerplate.php',
	'HtaccessConfig'           => 'system/modules/htaccess/HtaccessConfig.php',
	'HtaccessExpires'          => 'system/modules/htaccess/HtaccessExpires.php',
));


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
	'htaccess_rewrite_favicon'       => 'system/modules/htaccess/templates',
));
