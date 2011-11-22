# ----------------------------------------------------------------------
# Expires headers (for better cache control)
# ----------------------------------------------------------------------

# These are pretty far-future expires headers.
# They assume you control versioning with cachebusting query params like
#   <script src="application.js?20100608">
# Additionally, consider that outdated proxies may miscache
#   www.stevesouders.com/blog/2008/08/23/revving-filenames-dont-use-querystring/

# If you don't use filenames to version, lower the CSS  and JS to something like
#   "access plus 1 week" or so.

<IfModule mod_expires.c>

	##
	# Activate the module
	##
	ExpiresActive On

	<?php echo $this->submodules; ?>

	ExpiresDefault A<?php echo $this->default; ?>

	<?php
	foreach ($this->expires as $arrExpire):
		if (!empty($arrExpire['mimetype']) && !empty($arrExpire['mode']) && strlen($arrExpire['time'])):
	?>ExpiresByType <?php echo $arrExpire['mimetype']; ?> <?php echo recalc_time_to_alternative($arrExpire['mode'], $arrExpire['time']); ?>

	<?php
	endif;
	endforeach;
	?>

	<IfModule mod_headers.c>
		Header append Cache-Control "public"
	</IfModule>

</IfModule>
