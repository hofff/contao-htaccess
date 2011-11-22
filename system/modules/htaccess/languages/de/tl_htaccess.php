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
 * Backend
 */
$GLOBALS['TL_LANG']['tl_htaccess']['edit']                     = '.htaccess Konfiguration';

/**
 * settings
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_settings_legend'] = 'Voreinstellungen und vorherige Versionen';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_load_settings']   = array('Voreinstellungen laden', 'Lädt ein Set ein Voreinstellungen.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_load_previous']   = array('Vorherige Version laden', 'Lädt eine vorherige Version.');
$GLOBALS['TL_LANG']['tl_htaccess']['confirmLoadSettings']      = 'Sind Sie sicher, dass Sie die Voreinstellung laden wollen?';
$GLOBALS['TL_LANG']['tl_htaccess']['confirmLoadSettings']      = 'Sind Sie sicher, dass Sie die vorherige Version laden wollen?';
$GLOBALS['TL_LANG']['tl_htaccess']['loadSettings']             = 'Voreinstellungsset <strong>%s</strong> wurde geladen!<br/>Überprüfen und Speichern Sie die Einstellungen um die .htaccess Datei zu aktualisieren.';
$GLOBALS['TL_LANG']['tl_htaccess']['loadPrevious']             = 'Version vom <strong>%s</strong> wurde geladen!<br/>Überprüfen und Speichern Sie die Einstellungen um die .htaccess Datei zu aktualisieren.';

/**
 * general
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_base_legend'] = 'Grundeinstellungen';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_template']    = array('Template', 'Bitte wählen Sie das Template für die .htaccess Datei aus.');
$GLOBALS['TL_LANG']['tl_htaccess']['updateHtaccess']       = 'Die .htaccess Datei wurde neu erstellt.';

/**
 * etag module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_legend']           = 'ETag Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_disable']          = array('ETag deaktivieren', 'ETag Support deaktivieren.');

/**
 * mime module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_legend']         = 'MIME Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_types']          = array('MIME-Types', 'Definieren Sie hier Ihre MIME-Type Liste.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_extension'] = array('Erweiterung(en)');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_mimetype']  = array('MIME-Type');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_encoding']  = array('MIME-Encoding');

/**
 * deflate module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_legend']         = 'Deflate Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_files']          = array('Dateien', 'Definieren Sie hier, welche Dateien durch mod_deflate automatisch komprimiert werden sollen. Regexp Syntax ist erlaubt.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_file_extension'] = array('Erweiterung');

/**
 * headers module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_headers_legend']   = 'Headers Modul';

/**
 * expires module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_legend']   = 'Expires Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_default']  = array('Standard Ablaufzeit', 'Definieren Sie hier die Standard Zeit, wann eine Datei abgelaufen ist und aktualisiert werden muss.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires']          = array('Ablaufzeiten nach Typ', 'Definieren Sie hier die Zeiten, wann eine Datei abgelaufen ist und aktualisiert werden muss.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mimetype'] = array('MIME-Type');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mode']     = array('Mode');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time']     = array('Zeit', '%d Jahr(e)', '%d Monat(e)', '%d Woche(n)', '%d Tag(e)', '%s Stunde(n)', '%s Minute(n)', 'sofort');

/**
 * custom module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom_legend']   = 'Custom Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom']          = array('Custom Code', 'Geben Sie hier Ihren .htaccess Code ein.');

/**
 * rewrite module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_legend']      = 'Rewrite Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_rules']       = array('Eigene Rewrite Regeln', 'Definieren Sie hier Ihre eigenen Rewrite Regeln.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_prepend_www'] = array('www. hinzufügen', 'Rewrite Regel für Domains mit www. erzeugen, so dass beim Aufruf der Domain ohne www. zur Domain mit www. umgeleitet wird.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_remove_www']  = array('www. entfernen', 'Rewrite Regel für Domains ohne www. erzeugen, so dass beim Aufruf der Domain mit www. zur Domain ohne www. umgeleitet wird.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_gzip']        = array('.gz Rewrite', 'Rewrite Regel für vorkomprimierte .gz Dateien erzeugen. Leitet transparent Aufrufe von .js und .css Dateien auf vorkomprimierte .js.gz bzw. .css.gz Dateien.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_suffix']      = array('Contao Rewrite Suffix', 'Definieren Sie hier den Dateisuffix (z.B. html) für die der Requests auf Contao umgeleitet werden soll. Kann auch leer gelassen werden, um alle dynamischen Requests umzuleiten.');

/**
 * html5boilderplate settings
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_legend']      = 'html5boilderplate Einstellungen';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_x_ua_compatible']    = array('Neueste IE Engine erzwingen', 'Erzwingt den IE die neueste Engine zu verwenden und den Kompatibilitätsmodus zu umgehen.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_cross_domain_ajax']     = array('Cross-Domain AJAX Requests', 'Cross-Domain AJAX Requests erlauben.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_concatenation_include'] = array('Includes in CSS/JS Dateien erlauben', 'Erlaubt <a href="https://github.com/h5bp/html5-boilerplate/blob/master/.htaccess#L111" target="_blank">Server-Side-Includes</a> in *.combined.css/js Dateien. In der *.combined.* Datei müssen Includes eingefügt werden, um so eine dynamisch vereinheitlichte Datei zu erhalten.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_h5bp_ie_flicker_fix']        = array('IE Flimmern bei CSS rollover verhindern', '(nur IE) Verhindert das Flimmern das beim nachladen von Bildern durch CSS rollover entstehen kann.');
