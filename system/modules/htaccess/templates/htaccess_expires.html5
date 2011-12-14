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
	?>ExpiresByType <?php echo $arrExpire['mimetype']; ?> <?php echo $arrExpire['mode']; ?><?php echo $arrExpire['time']; ?>

	<?php
	endif;
	endforeach;
	?>

</IfModule>
