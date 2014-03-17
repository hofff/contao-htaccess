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
 * DCA tl_page
 */
$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] = array('Bit3\Contao\Htaccess\DataContainer', 'updatePage');
