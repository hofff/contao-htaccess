<IfModule mod_headers.c>

	<?php echo $this->submodules; ?>

	##
	# Add a Vary Accept-Encoding header for the compressed resources. If you
	# modify the file types above, make sure to change them here accordingly.
	# @see http://developer.yahoo.com/performance/rules.html#gzip
	##
	<FilesMatch "\.(js|css|xml|gz)$">
		Header append Vary Accept-Encoding
	</FilesMatch>

</IfModule>
