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
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_settings_legend'] = 'Voreinstellungen';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_load_settings'] = array('Voreinstellungen laden', 'Lädt ein Set ein Voreinstellungen, dieser Vorgang kann nicht rückgängig gemacht werden!');
$GLOBALS['TL_LANG']['tl_htaccess']['confirmLoadSettings']      = 'Sind Sie sicher, dass Sie die Voreinstellung laden wollen?\nDieser Vorgang kann nicht rückgängig gemacht werden!';
$GLOBALS['TL_LANG']['tl_htaccess']['loadSettings']             = 'Voreinstellungsset <strong>%s</strong> wurde geladen!';

/**
 * general
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_base_legend'] = 'Grundeinstellungen';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_template']    = array('Template', 'Bitte wählen Sie das Template für die .htaccess Datei aus.');

/**
 * etag module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_legend']           = 'ETag Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_etag']           = array('ETag Modul aktivieren', 'Mit dem ETag Modul wird der ETag kontrolliert, standardmäßig wird der ETag Header damit deaktiviert.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_template']         = array('ETag Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_etag_headers_template'] = array('ETag Headers Submodul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * mime module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_legend']         = 'MIME Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_mime']         = array('MIME Modul aktivieren', 'Das MIME Modul kontrolliert, welchen MIME-Type der Webserver an den Client schickt.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_types']          = array('MIME-Types', 'Definieren Sie hier Ihre MIME-Type Liste.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_extension'] = array('Erweiterung(en)');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_mimetype']  = array('MIME-Type');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_type_encoding']  = array('MIME-Encoding');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_mime_template']       = array('MIME Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * deflate module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_legend']         = 'Deflate Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_deflate']         = array('Deflate Modul aktivieren', 'Das Deflate Modul sorgt dafür, dass Dateien komprimiert (gzip) an den Client geschickt werden.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_files']          = array('Dateien', 'Definieren Sie hier, welche Dateien durch mod_deflate automatisch komprimiert werden sollen. Regexp Syntax ist erlaubt.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_file_extension'] = array('Erweiterung');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_deflate_template']       = array('Deflate Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * headers module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_headers_legend']   = 'Headers Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_headers']   = array('Headers Modul aktivieren', 'Das Headers Modul setzt verschiedene HTTP Header um dem Browsers zusätzliche Informationen zu geben und sein Verhalten zu beeinflussen.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_headers_template'] = array('Headers Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * expires module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_legend']   = 'Expires Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_expires']   = array('Expires Modul aktivieren', 'Das Expires Modul setzt die Ablaufzeit von Dateien und bestimmt damit, wann ein Browser seinen Cache aktualisiert.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_default']  = array('Standard Ablaufzeit', 'Definieren Sie hier die Standard Zeit, wann eine Datei abgelaufen ist und aktualisiert werden muss.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires']          = array('Ablaufzeiten nach Typ', 'Definieren Sie hier die Zeiten, wann eine Datei abgelaufen ist und aktualisiert werden muss.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mimetype'] = array('MIME-Type');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_mode']     = array('Mode');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_time']     = array('Zeit', '%d Jahr(e)', '%d Monat(e)', '%d Tag(e)', '%s Stunde(n)', '%s Minute(n)', 'sofort');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_expires_template'] = array('Expires Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * custom module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom_legend']   = 'Custom Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_custom']   = array('Custom Modul aktivieren', 'Mit dem Custom Modul kann ein beliebiger Code in die .htaccess generiert werden.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom']          = array('Custom Code', 'Geben Sie hier Ihren .htaccess Code ein.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_custom_template'] = array('Custom Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');

/**
 * rewrite module
 */
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_legend']      = 'Rewrite Modul';
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_module_rewrite']      = array('Rewrite Modul aktivieren', 'Das Rewrite Modul erlaubt das Umschreiben der URL virtuell am Server oder durch Redirect am Client.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_prepend_www'] = array('www. hinzufügen', 'Rewrite Regel für Domains mit www. erzeugen, so dass beim Aufruf der Domain ohne www. zur Domain mit www. umgeleitet wird.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_remove_www']  = array('www. entfernen', 'Rewrite Regel für Domains ohne www. erzeugen, so dass beim Aufruf der Domain mit www. zur Domain ohne www. umgeleitet wird.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_gzip']        = array('.gz Rewrite', 'Rewrite Regel für vorkomprimierte .gz Dateien erzeugen. Leitet transparent Aufrufe von .js und .css Dateien auf vorkomprimierte .js.gz bzw. .css.gz Dateien.');
$GLOBALS['TL_LANG']['tl_htaccess']['htaccess_rewrite_template']    = array('Rewrite Modul Template', 'Bitte wählen Sie das Template für dieses Modul aus.');
