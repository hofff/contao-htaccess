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
		'dataContainer'               => 'File_Htaccess',
		'closed'                      => true,
		'onload_callback'             => array
		(
			array('tl_htaccess', 'onload')
		),
		'onsubmit_callback'           => array
		(
			array('tl_htaccess', 'onsubmit')
		)
	),

	// meta pallettes
	'metapalettes' => array
	(
		'default' => array
		(
			'htaccess_settings' => array(':hide', 'htaccess_load_settings', 'htaccess_load_previous'),
			'htaccess_base'     => array('htaccess_template'),
			'htaccess_etag'     => array('htaccess_etag_disable'),
			'htaccess_mime'     => array('htaccess_mime_types'),
			'htaccess_deflate'  => array('htaccess_deflate_files'),
			'htaccess_headers'  => array(),
			'htaccess_expires'  => array('htaccess_expires_default', 'htaccess_expires'),
			'htaccess_custom'   => array(':hide', 'htaccess_custom'),
			'htaccess_rewrite'  => array('htaccess_rewrite_rules', 'htaccess_rewrite_prepend_www', 'htaccess_rewrite_remove_www', 'htaccess_rewrite_gzip', 'htaccess_rewrite_suffix'),
			'htaccess_h5bp'     => array('htaccess_h5bp_ie_x_ua_compatible', 'htaccess_h5bp_cross_domain_ajax', 'htaccess_h5bp_concatenation_include', 'htaccess_h5bp_ie_flicker_fix')
		)
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
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'htaccess_load_previous'      => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_load_previous'],
			'inputType'               => 'select',
			'options_callback'        => array('tl_htaccess', 'previousOptions'),
			'save_callback'           => array(array('tl_htaccess', 'loadPrevious')),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'htaccess_template'           => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_template'],
			'inputType'               => 'select',
			'options'                 => array_map(create_function('$s', 'return substr($s, 14);'), $this->getTemplateGroup('htaccess_base_')),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'htaccess_etag_disable'       => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_disable'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'m12')
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
		'htaccess_expires_default'    => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_default'],
			'inputType'               => 'select',
			'options'   => array
			(
				(60*60*24*30*12) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1], 1),  //  1 year
				 (60*60*24*30*6) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 6),  //  6 months
				 (60*60*24*30*3) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 3),  //  3 months
				   (60*60*24*30) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 1),  //  1 month
				   (60*60*24*15) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 2), //  2 weeks
				  (60*60*24*7.5) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 1),  //  1 week
					(60*60*24*3) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 3),  //  3 days
					  (60*60*24) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 1),  //  1 day
					  (60*60*12) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 12), // 12 hours
					   (60*60*6) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 6),  //  6 hours
						 (60*60) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 1),  //  1 hour
						 (60*30) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 30), // 30 minutes
						 (60*15) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 15), // 15 minutes
						  (60*5) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 5),  //  5 minutes
							  60 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 1),  //  1 minute
							   0 => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][7]               // now
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
							(60*60*24*30*12) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][1], 1),  //  1 year
							 (60*60*24*30*6) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 6),  //  6 months
							 (60*60*24*30*3) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 3),  //  3 months
							   (60*60*24*30) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][2], 1),  //  1 month
							   (60*60*24*15) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 2), //  2 weeks
							  (60*60*24*7.5) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][3], 1),  //  1 week
								(60*60*24*3) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 3),  //  3 days
								  (60*60*24) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][4], 1),  //  1 day
								  (60*60*12) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 12), // 12 hours
								   (60*60*6) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 6),  //  6 hours
									 (60*60) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][5], 1),  //  1 hour
									 (60*30) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 30), // 30 minutes
									 (60*15) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 15), // 15 minutes
									  (60*5) => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 5),  //  5 minutes
										  60 => sprintf($GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][6], 1),  //  1 minute
										   0 => $GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time'][7]               // now
						),
						'eval'      => array('style' => 'width:100px', 'mandatory'=>true)
					)
				)
			)
		),
		'htaccess_custom'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom'],
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true, 'preserveTags'=>true, 'decodeEntities'=>true, 'rte'=>'codeMirror')
		),
		'htaccess_rewrite_rules'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_rules'],
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true, 'preserveTags'=>true, 'decodeEntities'=>true, 'rte'=>'codeMirror')
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
			'eval'                    => array('tl_class'=>'clr w50 m12')
		),
		'htaccess_rewrite_suffix'   => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_suffix'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alpha', 'tl_class'=>'w50')
		),
		'htaccess_h5bp_ie_x_ua_compatible' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_x_ua_compatible'],
			'inputType'               => 'checkbox'
		),
		'htaccess_h5bp_cross_domain_ajax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_cross_domain_ajax'],
			'inputType'               => 'checkbox'
		),
		'htaccess_h5bp_concatenation_include' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_concatenation_include'],
			'inputType'               => 'checkbox'
		),
		'htaccess_h5bp_ie_flicker_fix'   => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_flicker_fix'],
			'inputType'               => 'checkbox'
		),
	)
);

class tl_htaccess extends Backend
{
	/**
	 * @var Htaccess
	 */
	protected $Htaccess;

	/**
	 * @var Files
	 */
	protected $Files;

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
	 * @return array
	 */
	public function previousOptions()
	{
		$arrOptions = array();
		$objIterator = new RegexIterator(new DirectoryIterator(TL_ROOT . '/system/config'), '#^htaccess\.\d+\.php$#');
		foreach ($objIterator as $strFile)
		{
			$intTime = intval(substr($strFile, 9, -4));
			$arrOptions[$intTime] = $this->parseDate('d.m.Y - H:i:s', $intTime);
		}
		krsort($arrOptions);
		return $arrOptions;
	}

	/**
	 * Load settings
	 */
	public function loadSettings($strPresettings)
	{
		if (isset($GLOBALS['TL_HTACCESS_DEFAULTS'][$strPresettings]))
		{
			$this->import('HtaccessConfig', 'Config', true);
			
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

	/**
	 * Load previous version
	 */
	public function loadPrevious($intPrevious)
	{
		$strFile = 'system/config/htaccess.' . $intPrevious . '.php';
		if (file_exists(TL_ROOT . '/' . $strFile))
		{
			$this->import('Files');
			
			// Move current file
			$objFile = new File('system/config/htaccess.php');
			$this->Files->rename('system/config/htaccess.php', 'system/config/htaccess.' . $objFile->mtime . '.php');

			// Copy previous file
			$this->Files->copy($strFile, 'system/config/htaccess.php');

			$_SESSION['TL_INFO'][] = sprintf($GLOBALS['TL_LANG']['tl_htaccess']['loadPrevious'], $this->parseDate('d.m.Y - H:i:s', $intPrevious));
			$this->reload();
		}
	}
}
