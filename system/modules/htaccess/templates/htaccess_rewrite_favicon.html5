<?php
foreach ($this->favicons as $strDomain => $strFile):
?>
	<?php if ($strDomain): ?>RewriteCond %{HTTP_HOST} ^<?php echo preg_quote($strDomain); ?> [NC]
	<?php endif; ?>RewriteRule ^favicon.ico <?php echo str_replace(' ', '\\ ', $strFile); ?> [L]

<?php
endforeach;
?>