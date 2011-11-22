
<?php if ($this->concatenation_include): ?>
# ----------------------------------------------------------------------
# html5boilderplate - Allow concatenation from within specific js and css files
# ----------------------------------------------------------------------

# e.g. Inside of script.combined.js you could have
#   <!--#include file="libs/jquery-1.5.0.min.js" -->
#   <!--#include file="plugins/jquery.idletimer.js" -->
# and they would be included into this single file.

# This is not in use in the boilerplate as it stands. You may
# choose to name your files in this way for this advantage or
# concatenate and minify them manually.
# Disabled by default.

<FilesMatch "\.combined\.js$">
	Options +Includes
	AddOutputFilterByType INCLUDES application/javascript application/json
	SetOutputFilter INCLUDES
</FilesMatch>
<FilesMatch "\.combined\.css$">
	Options +Includes
	AddOutputFilterByType INCLUDES text/css
	SetOutputFilter INCLUDES
</FilesMatch>

<?php endif; ?>

<?php if ($this->ie_flicker_fix): ?>
# ----------------------------------------------------------------------
# html5boilderplate - Stop screen flicker in IE on CSS rollovers
# ----------------------------------------------------------------------

# The following directives stop screen flicker in IE on CSS rollovers - in
# combination with the "ExpiresByType" rules for images (see above). If
# needed, un-comment the following rules.

BrowserMatch "MSIE" brokenvary=1
BrowserMatch "Mozilla/4.[0-9]{2}" brokenvary=1
BrowserMatch "Opera" !brokenvary
SetEnvIf brokenvary 1 force-no-vary

<?php endif; ?>
