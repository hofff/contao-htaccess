# !!!!!!!!!! WARNING !!!!!!!!!!
#
# this file is automatic generated!
# do not modify directly, use the htaccess builder!
#
# !!!!!!!!!! WARNING !!!!!!!!!!

##
# Prevent access to the Contao template files
##
<FilesMatch "\.(tpl|html5|xhtml)$">
	Order allow,deny
	Deny from all
</FilesMatch>

<?php echo $this->modules; ?>

# ----------------------------------------------------------------------
# Prevent 404 errors for non-existing redirected folders
# ----------------------------------------------------------------------

# without -MultiViews, Apache will give a 404 for a rewrite if a folder of the same name does not exist
#   e.g. /blog/hello : webmasterworld.com/apache/3808792.htm

Options -MultiViews



# ----------------------------------------------------------------------
# Custom 404 page
# ----------------------------------------------------------------------

# You can add custom pages to handle 500 or 403 pretty easily, if you like.
ErrorDocument 404 /404.html



# ----------------------------------------------------------------------
# UTF-8 encoding
# ----------------------------------------------------------------------

# Use UTF-8 encoding for anything served text/plain or text/html
AddDefaultCharset utf-8

# Force UTF-8 for a number of file formats
AddCharset utf-8 .html .css .js .xml .json .rss .atom



# ----------------------------------------------------------------------
# A little more security
# ----------------------------------------------------------------------


# Do we want to advertise the exact version number of Apache we're running?
# Probably not.
## This can only be enabled if used in httpd.conf - It will not work in .htaccess
# ServerTokens Prod


# "-Indexes" will have Apache block users from browsing folders without a default document
# Usually you should leave this activated, because you shouldn't allow everybody to surf through
# every folder on your server (which includes rather private places like CMS system folders).
<IfModule mod_autoindex.c>
  Options -Indexes
</IfModule>


# Block access to "hidden" directories whose names begin with a period. This
# includes directories used by version control systems such as Subversion or Git.
<IfModule mod_rewrite.c>
  RewriteRule "(^|/)\." - [F]
</IfModule>


# Block access to backup and source files
# This files may be left by some text/html editors and
# pose a great security danger, when someone can access them
<FilesMatch ".(bak|config|sql|fla|psd|ini|log|sh|inc|~|swp)$">
  Order allow,deny
  Deny from all
  Satisfy All
</FilesMatch>


# If your server is not already configured as such, the following directive
# should be uncommented in order to set PHP's register_globals option to OFF.
# This closes a major security hole that is abused by most XSS (cross-site
# scripting) attacks. For more information: http://php.net/register_globals
#
# IF REGISTER_GLOBALS DIRECTIVE CAUSES 500 INTERNAL SERVER ERRORS :
#
# Your server does not allow PHP directives to be set via .htaccess. In that
# case you must make this change in your php.ini file instead. If you are
# using a commercial web host, contact the administrators for assistance in
# doing this. Not all servers allow local php.ini files, and they should
# include all PHP configurations (not just this one), or you will effectively
# reset everything to PHP defaults. Consult www.php.net for more detailed
# information about setting PHP directives.

# php_flag register_globals Off

# Rename session cookie to something else, than PHPSESSID
# php_value session.name sid

# Do not show you are using PHP
# Note: Move this line to php.ini since it won't work in .htaccess
# php_flag expose_php Off

# Level of log detail - log all errors
# php_value error_reporting -1

# Write errors to log file
# php_flag log_errors On

# Do not display errors in browser (production - Off, development - On)
# php_flag display_errors Off

# Do not display startup errors (production - Off, development - On)
# php_flag display_startup_errors Off

# Format errors in plain text
# Note: Leave this setting 'On' for xdebug's var_dump() output
# php_flag html_errors Off

# Show multiple occurrence of error
# php_flag ignore_repeated_errors Off

# Show same errors from different sources
# php_flag ignore_repeated_source Off

# Size limit for error messages
# php_value log_errors_max_len 1024

# Don't precede error with string (doesn't accept empty string, use whitespace if you need)
# php_value error_prepend_string " "

# Don't prepend to error (doesn't accept empty string, use whitespace if you need)
# php_value error_append_string " "

# Increase cookie security
<IfModule php5_module>
  php_value session.cookie_httponly true
</IfModule>
