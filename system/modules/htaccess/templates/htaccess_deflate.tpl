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
if (count($this->mimetypes)):
	?><IfModule filter_module>
		<?php foreach ($this->mimetypes as $strMimeType): ?>
	AddOutputFilterByType DEFLATE <?php echo $strMimeType; ?>

	<?php endforeach; ?>
	</IfModule><?php
endif;
?>

</IfModule>
