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
 * DCA tl_htaccess
 */
$GLOBALS['TL_DCA']['tl_htaccess'] = array
(

	// Config
	'config'          => array
	(
		'dataContainer' => 'General',
		'forceEdit'     => true,
	),
	'dca_config'      => array
	(
		'data_provider' => array
		(
			'default' => array
			(
				'class'     => 'ContaoCommunityAlliance\DcGeneral\DataProvider\PhpGlobalsConfigFileProvider',
				'source'    => TL_ROOT . '/system/config/htaccess.php',
				'namespace' => 'TL_CONFIG',
				'pattern'   => 'htaccess_*',
			)
		),
	),
	// meta pallettes
	'metapalettes'    => array
	(
		'default' => array
		(
			'htaccess_base'    => array('htaccess_default_charset'),
			'htaccess_auth'    => array('htaccess_auth_enabled'),
			'htaccess_etag'    => array('htaccess_etag_disable'),
			'htaccess_mime'    => array('htaccess_mime_types'),
			'htaccess_deflate' => array('htaccess_deflate_files'),
			'htaccess_headers' => array(),
			'htaccess_expires' => array('htaccess_expires_default', 'htaccess_expires'),
			'htaccess_custom'  => array(':hide', 'htaccess_custom'),
			'htaccess_rewrite' => array(
				'htaccess_rewrite_rules',
				'htaccess_rewrite_domains_rules',
				'htaccess_rewrite_gzip',
				'htaccess_rewrite_disabled_files',
				'htaccess_rewrite_suffix',
			),
			'htaccess_h5bp'    => array(
				'htaccess_h5bp_disable_multiview',
				'htaccess_h5bp_disable_indexes',
				'htaccess_h5bp_ie_x_ua_compatible',
				'htaccess_h5bp_cross_domain_ajax',
				'htaccess_h5bp_concatenation_include',
				'htaccess_h5bp_ie_flicker_fix'
			)
		)
	),
	'metasubpalettes' => array
	(
		'htaccess_auth_enabled' => array('htaccess_auth_mode', 'htaccess_auth_name', 'htaccess_auth_users')
	),
	// Fields
	'fields'          => array
	(
		/* base */
		'htaccess_default_charset'            => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_default_charset'],
			'inputType' => 'select',
			'options'   => array('utf-8', 'latin-1', 'iso-8859-1', 'iso-8859-15'),
			'eval'      => array('tl_class' => 'w50', 'chosen' => true)
		),
		/* auth */
		'htaccess_auth_enabled'               => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_enabled'],
			'inputType' => 'checkbox',
			'eval'      => array(
				'tl_class'       => 'm12',
				'submitOnChange' => true,
				'disabled'       => in_array('mcrypt', get_loaded_extensions()) ? false : true
			)
		),
		'htaccess_auth_mode'                  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_mode'],
			'inputType' => 'select',
			'options'   => array('digest', 'basic'),
			'reference' => &$GLOBALS['TL_LANG']['tl_htaccess'],
			'eval'      => array('tl_class' => 'w50', 'chosen' => true)
		),
		'htaccess_auth_name'                  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_name'],
			'inputType' => 'text',
			'eval'      => array('tl_class' => 'w50')
		),
		'htaccess_auth_users'                 => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_users'],
			'inputType' => 'multiColumnWizard',
			'eval'      => array
			(
				'tl_class'     => 'clr',
				'columnFields' => array
				(
					'username' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_username'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:150px', 'mandatory' => true)
					),
					'password' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_auth_password'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array(
							'style'     => 'width:150px',
							'mandatory' => true,
							'hideInput' => true,
							'encrypt'   => true
						)
					)
				)
			)
		),
		/* etag */
		'htaccess_etag_disable'               => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_disable'],
			'inputType' => 'checkbox',
			'eval'      => array('tl_class' => 'm12')
		),
		/* mime */
		'htaccess_mime_types'                 => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_types'],
			'inputType' => 'multiColumnWizard',
			'eval'      => array
			(
				'columnFields' => array
				(
					'extension' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_extension'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:150px', 'mandatory' => true)
					),
					'mimetype'  => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_mimetype'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px')
					),
					'encoding'  => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_encoding'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px')
					)
				)
			)
		),
		/* deflate */
		'htaccess_deflate_files'              => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_files'],
			'inputType' => 'multiColumnWizard',
			'eval'      => array
			(
				'columnFields' => array
				(
					'mimetype' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_file_mimetype'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:150px', 'mandatory' => true)
					)
				)
			)
		),
		/* expires */
		'htaccess_expires_default'            => array
		(
			'label'         => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_default'],
			'inputType'     => 'select',
			'options'       => array
			(
				'T' . (60 * 60 * 24 * 30 * 12) => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1],
					1
				), //  1 year
				'T' . (60 * 60 * 24 * 30 * 6)  => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
					6
				), //  6 months
				'T' . (60 * 60 * 24 * 30 * 3)  => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
					3
				), //  3 months
				'T' . (60 * 60 * 24 * 30)      => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
					1
				), //  1 month
				'T' . (60 * 60 * 24 * 15)      => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3],
					2
				), //  2 weeks
				'T' . (60 * 60 * 24 * 7.5)     => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3],
					1
				), //  1 week
				'T' . (60 * 60 * 24 * 3)       => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4],
					3
				), //  3 days
				'T' . (60 * 60 * 24)           => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4],
					1
				), //  1 day
				'T' . (60 * 60 * 12)           => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
					12
				), // 12 hours
				'T' . (60 * 60 * 6)            => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
					6
				), //  6 hours
				'T' . (60 * 60)                => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
					1
				), //  1 hour
				'T' . (60 * 30)                => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
					30
				), // 30 minutes
				'T' . (60 * 15)                => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
					15
				), // 15 minutes
				'T' . (60 * 5)                 => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
					5
				), //  5 minutes
				'T' . 60                       => sprintf(
					$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
					1
				), //  1 minute
				'T' . 0                        => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][7] // now
			),
			'eval'          => array('chosen' => true),
			'load_callback' => array(array('Bit3\Contao\Htaccess\DataContainer', 'loadTime')),
			'save_callback' => array(array('Bit3\Contao\Htaccess\DataContainer', 'saveTime')),
		),
		'htaccess_expires'                    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires'],
			'inputType' => 'multiColumnWizard',
			'eval'      => array
			(
				'columnFields' => array
				(
					'mimetype' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mimetype'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px', 'mandatory' => true)
					),
					'mode'     => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mode'],
						'exclude'   => true,
						'inputType' => 'select',
						'options'   => array('A', 'M'),
						'eval'      => array('style' => 'width:40px', 'mandatory' => true, 'chosen' => true)
					),
					'time'     => array
					(
						'label'         => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'],
						'exclude'       => true,
						'inputType'     => 'select',
						'options'       => array
						(
							'T' . (60 * 60 * 24 * 30 * 12) => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1],
								1
							),
							//  1 year
							'T' . (60 * 60 * 24 * 30 * 6)  => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
								6
							),
							//  6 months
							'T' . (60 * 60 * 24 * 30 * 3)  => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
								3
							),
							//  3 months
							'T' . (60 * 60 * 24 * 30)      => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2],
								1
							),
							//  1 month
							'T' . (60 * 60 * 24 * 15)      => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3],
								2
							),
							//  2 weeks
							'T' . (60 * 60 * 24 * 7.5)     => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3],
								1
							),
							//  1 week
							'T' . (60 * 60 * 24 * 3)       => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4],
								3
							),
							//  3 days
							'T' . (60 * 60 * 24)           => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4],
								1
							),
							//  1 day
							'T' . (60 * 60 * 12)           => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
								12
							),
							// 12 hours
							'T' . (60 * 60 * 6)            => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
								6
							),
							//  6 hours
							'T' . (60 * 60)                => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5],
								1
							),
							//  1 hour
							'T' . (60 * 30)                => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
								30
							),
							// 30 minutes
							'T' . (60 * 15)                => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
								15
							),
							// 15 minutes
							'T' . (60 * 5)                 => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
								5
							),
							//  5 minutes
							'T' . 60                       => sprintf(
								$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6],
								1
							),
							//  1 minute
							'T' . 0                        => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][7]
							// now
						),
						'eval'          => array('style' => 'width:140px', 'mandatory' => true, 'chosen' => true),
						'load_callback' => array(array('Bit3\Contao\Htaccess\DataContainer', 'loadTime')),
						'save_callback' => array(array('Bit3\Contao\Htaccess\DataContainer', 'saveTime'))
					)
				)
			)
		),
		/* custom */
		'htaccess_custom'                     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom'],
			'inputType' => 'textarea',
			'eval'      => array(
				'allowHtml'      => true,
				'preserveTags'   => true,
				'decodeEntities' => true,
				'rte'            => (version_compare(VERSION, '2.10') >= 0 ? 'codeMirror' : '')
			)
		),
		/* rewrite */
		'htaccess_rewrite_rules'              => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_rules'],
			'inputType' => 'textarea',
			'eval'      => array(
				'allowHtml'      => true,
				'preserveTags'   => true,
				'decodeEntities' => true,
				'rte'            => (version_compare(VERSION, '2.10') >= 0 ? 'codeMirror' : '')
			)
		),
		'htaccess_rewrite_domains_rules'            => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_domains_rules'],
			'inputType' => 'multiColumnWizard',
			'eval'      => array
			(
				'tl_class'     => 'clr',
				'columnFields' => array
				(
					'domain' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_domains_rules__domain'],
						'exclude'          => true,
						'inputType'        => 'select',
						'options_callback' => array('Bit3\Contao\Htaccess\DataContainer', 'getDomainOptions'),
						'eval'             => array('style' => 'width:300px', 'includeBlankOption' => true),
					),
					'www'    => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_domains_rules__www'],
						'exclude'   => true,
						'inputType' => 'checkbox',
						'reference' => &$GLOBALS['TL_LANG']['tl_htaccess'],
						'eval'      => array('style' => 'width:60px;text-align:left', 'includeBlankOption' => true),
					),
					'https'  => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_domains_rules__https'],
						'exclude'   => true,
						'inputType' => 'select',
						'options'   => array('enforce', 'prevent'),
						'reference' => &$GLOBALS['TL_LANG']['tl_htaccess'],
						'eval'      => array('style' => 'width:100px', 'includeBlankOption' => true),
					),
				),
			),
		),
		'htaccess_rewrite_gzip'               => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_gzip'],
			'inputType' => 'checkbox',
			'eval'      => array('tl_class' => 'clr')
		),
		/* rewrite */
		'htaccess_rewrite_disabled_files'              => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_disabled_files'],
			'inputType' => 'text',
			'eval'      => array(
				'tl_class' => 'clr long',
			)
		),
		'htaccess_rewrite_suffix'             => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_suffix'],
			'inputType' => 'text',
			'eval'      => array('rgxp' => 'alpha', 'tl_class' => 'clr')
		),
		/* html5boilerplate */
		'htaccess_h5bp_disable_multiview'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_disable_multiview'],
			'inputType' => 'checkbox'
		),
		'htaccess_h5bp_disable_indexes'       => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_disable_indexes'],
			'inputType' => 'checkbox'
		),
		'htaccess_h5bp_ie_x_ua_compatible'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_x_ua_compatible'],
			'inputType' => 'checkbox'
		),
		'htaccess_h5bp_cross_domain_ajax'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_cross_domain_ajax'],
			'inputType' => 'checkbox'
		),
		'htaccess_h5bp_concatenation_include' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_concatenation_include'],
			'inputType' => 'checkbox'
		),
		'htaccess_h5bp_ie_flicker_fix'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_flicker_fix'],
			'inputType' => 'checkbox'
		),
	)
);
