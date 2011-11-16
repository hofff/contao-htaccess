<IfModule mod_deflate.c>

	<?php echo $this->submodules; ?>

	##
	# Use mod_deflate to compress JavaScript, CSS, XML, HTML and PHP files.
	# @see http://developer.yahoo.com/performance/rules.html#gzip
	##
	<?php
	if (count($this->extensions)):
	?><FilesMatch "\.(<?php echo implode('|', $this->extensions); ?>)$">
		SetOutputFilter DEFLATE
	</FilesMatch><?php
	endif;
	?>

</IfModule>
