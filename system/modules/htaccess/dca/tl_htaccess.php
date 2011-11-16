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
 * DCA tl_htaccess
 */
$GLOBALS['TL_DCA']['tl_htaccess'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'File',
		'closed'                      => true,
		'onload_callback'           => array
		(
			array('tl_htaccess', 'onload')
		),
		'onsubmit_callback'           => array
		(
			array('tl_htaccess', 'onsubmit')
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('htaccess_module_etag', 'htaccess_module_mime', 'htaccess_module_deflate', 'htaccess_module_headers', 'htaccess_module_expires', 'htaccess_module_custom', 'htaccess_module_rewrite'),
		'default'                     => '{htaccess_settings_legend:hide},htaccess_load_settings;{htaccess_base_legend},htaccess_template;{htaccess_etag_legend},htaccess_module_etag;{htaccess_mime_legend},htaccess_module_mime;{htaccess_deflate_legend},htaccess_module_deflate;{htaccess_headers_legend},htaccess_module_headers;{htaccess_expires_legend},htaccess_module_expires;{htaccess_custom_legend},htaccess_module_custom;{htaccess_rewrite_legend},htaccess_module_rewrite'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'htaccess_module_etag'        => 'htaccess_etag_template,htaccess_etag_headers_template',
		'htaccess_module_mime'        => 'htaccess_mime_types,htaccess_mime_template',
		'htaccess_module_deflate'     => 'htaccess_deflate_files,htaccess_deflate_template',
		'htaccess_module_headers'     => 'htaccess_headers_template',
		'htaccess_module_expires'     => 'htaccess_expires_default,htaccess_expires,htaccess_expires_template',
		'htaccess_module_custom'      => 'htaccess_custom,htaccess_custom_template',
		'htaccess_module_rewrite'     => 'htaccess_rewrite_prepend_www,htaccess_rewrite_remove_www,htaccess_rewrite_gzip,htaccess_rewrite_template'
	),

	// Fields
	'fields' => array
	(
		'htaccess_load_settings'      => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_load_settings'],
			'inputType'               => 'select',
			'options'                 => array_keys($GLOBALS['TL_HTACCESS_DEFAULTS']),
			'save_callback'           => array(array('tl_htaccess', 'loadSettings')),
			'eval'                    => array('includeBlankOption'=>true)
		),
		'htaccess_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_base_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_etag'        => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_etag'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_etag_template'      => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_template'],
			'inputType'               => 'select',
			'options'                 => array_filter($this->getTemplateGroup('htaccess_etag_'), create_function('$template', 'return !preg_match("#^htaccess_etag_headers_#", $template);')),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_etag_headers_template' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_headers_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_etag_headers_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_mime'        => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_mime'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_mime_types'        => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_types'],
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'columnFields' => array
				(
					'extension' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_extension'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:150px', 'mandatory'=>true)
					),
					'mimetype' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_mimetype'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px')
					),
					'encoding' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_encoding'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px')
					)
				)
			)
		),
		'htaccess_mime_template'      => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_mime_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_deflate'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_deflate'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_deflate_files'        => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_files'],
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'columnFields' => array
				(
					'extension' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_file_extension'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:150px', 'mandatory'=>true)
					)
				)
			)
		),
		'htaccess_deflate_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_deflate_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_headers'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_headers'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_headers_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_headers_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_headers_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_expires'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_expires'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_expires_default'    => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_default'],
			'inputType'               => 'select',
			'options'   => array
			(
				31104000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1], 1),
				15552000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 6),
				 7776000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 3),
				 2592000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 1),
				 1296000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 15),
				  604800 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 7),
				  259200 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 3),
				   86400 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 1),
				   43200 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 12),
				   21600 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 6),
					3600 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 1),
					1800 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 30),
					 900 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 15),
					 300 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 5),
					  60 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 1),
					   0 => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6]
			),
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_expires'        => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires'],
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'columnFields' => array
				(
					'mimetype' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mimetype'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array('style' => 'width:200px', 'mandatory'=>true)
					),
					'mode' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mode'],
						'exclude'   => true,
						'inputType' => 'select',
						'options'   => array('A', 'M'),
						'eval'      => array('style' => 'width:40px', 'mandatory'=>true)
					),
					'time' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'],
						'exclude'   => true,
						'inputType' => 'select',
						'options'   => array
						(
							31104000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1], 1),
							15552000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 6),
							 7776000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 3),
							 2592000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 1),
							 1296000 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 15),
							  604800 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 7),
							  259200 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 3),
							   86400 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 1),
							   43200 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 12),
							   21600 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 6),
							    3600 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 1),
							    1800 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 30),
							     900 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 15),
							     300 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 5),
							      60 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 1),
							       0 => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6]
						),
						'eval'      => array('style' => 'width:100px', 'mandatory'=>true)
					)
				)
			)
		),
		'htaccess_expires_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_expires_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_custom'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_custom'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_custom'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom'],
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'allowHtml'=>true, 'preserveTags'=>true, 'decodeEntities'=>true)
		),
		'htaccess_custom_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_rewrite_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_module_rewrite'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_rewrite'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'htaccess_rewrite_prepend_www'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_prepend_www'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50')
		),
		'htaccess_rewrite_remove_www'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_remove_www'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50')
		),
		'htaccess_rewrite_gzip'     => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_gzip'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50')
		),
		'htaccess_rewrite_template'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_template'],
			'inputType'               => 'select',
			'options'                 => $this->getTemplateGroup('htaccess_rewrite_'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		)
	)
);

class tl_htaccess extends Backend
{
	/**
	 * @var Htaccess
	 */
	protected $Htaccess;

	/**
	 * @return void
	 */
	public function onload()
	{
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/htaccess/html/be.js';
	}

	/**
	 * @return void
	 */
	public function onsubmit()
	{
		$this->import('Htaccess');
		$this->Htaccess->update();
	}

	/**
	 * Load settings
	 */
	public function loadSettings($strPresettings)
	{
		if (isset($GLOBALS['TL_HTACCESS_DEFAULTS'][$strPresettings]))
		{
			foreach ($GLOBALS['TL_HTACCESS_DEFAULTS'][$strPresettings] as $k=>$v)
			{
				if (preg_match('#^htaccess_#', $k))
				{
					$strKey = sprintf("\$GLOBALS['TL_CONFIG']['%s']", $k);
					$this->Config->update($strKey, is_array($v) ? serialize($v) : $v);
				}
			}
			$_SESSION['TL_INFO'][] = sprintf($GLOBALS['TL_LANG']['tl_htaccess']['loadSettings'], $strPresettings);
			$this->reload();
		}
	}
}
