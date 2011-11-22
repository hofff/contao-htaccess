<IfModule mod_deflate.c>

	<?php echo $this->submodules; ?>

	# Force deflate for mangled headers developer.yahoo.com/blogs/ydn/posts/2010/12/pushing-beyond-gzipping/
	<IfModule mod_setenvif.c>
		<IfModule mod_headers.c>
			SetEnvIfNoCase ^(Accept-EncodXng|X-cept-Encoding|X{15}|~{15}|-{15})$ ^((gzip|deflate)\s*,?\s*)+|[X~-]{4,13}$ HAVE_Accept-Encoding
			RequestHeader append Accept-Encoding "gzip,deflate" env=HAVE_Accept-Encoding
		</IfModule>
	</IfModule>

	<?php
	if (count($this->extensions)):
	?><IfModule filter_module>
		FilterDeclare   COMPRESS
		<?php foreach ($this->extensions as $strExtension): ?>
		FilterProvider  COMPRESS  DEFLATE resp=Content-Type $<?php echo $strExtension; ?>

		<?php endforeach; ?>
		FilterChain     COMPRESS
		FilterProtocol  COMPRESS  DEFLATE change=yes;byteranges=no
	</IfModule>

	<IfModule !mod_filter.c>
		# Legacy versions of Apache
		<?php foreach ($this->extensions as $strExtension): ?>
		AddOutputFilterByType DEFLATE <?php echo $strExtension; ?>

		<?php endforeach; ?>
	</IfModule><?php
	endif;
	?>

</IfModule>
