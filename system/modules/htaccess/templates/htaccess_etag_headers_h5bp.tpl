<?php if ($this->disabled): ?>

	# FileETag None is not enough for every server.
	Header unset ETag
<?php endif; ?>
