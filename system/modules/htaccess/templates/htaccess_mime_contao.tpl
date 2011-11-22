<IfModule mod_mime.c>

	<?php echo $this->submodules; ?>

	<?php
	foreach ($this->mimetypes as $arrFile):
		if (!empty($arrFile['mimetype']) && !empty($arrFile['extension'])):
	?>AddType <?php echo $arrFile['mimetype']; ?> <?php echo $arrFile['extension']; ?>

	<?php
		endif;
		if (!empty($arrFile['encoding']) && !empty($arrFile['extension'])):
	?>AddEncoding <?php echo $arrFile['encoding']; ?> <?php echo $arrFile['extension']; ?>

	<?php
		endif;
	endforeach;
	?>

</IfModule>
