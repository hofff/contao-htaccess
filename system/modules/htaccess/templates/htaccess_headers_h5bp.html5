<IfModule mod_headers.c>

	<?php echo $this->submodules; ?>

	# ----------------------------------------------------------------------
	# Webfont access
	# ----------------------------------------------------------------------

	# Allow access from all domains for webfonts.
	# Alternatively you could only whitelist your
	# subdomains like "subdomain.example.com".

	<FilesMatch "\.(ttf|ttc|otf|eot|woff|font.css)$">
		Header set Access-Control-Allow-Origin "*"
	</FilesMatch>

</IfModule>
