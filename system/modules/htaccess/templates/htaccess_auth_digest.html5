<?php if ($this->enabled): ?>
<IfModule mod_auth_digest.c>
	AuthType Digest
	AuthName "<?php echo $this->name; ?>"
	AuthUserFile "<?php echo $this->htusers; ?>"
	Require valid-user
<?php echo $this->submodules; ?>
</IfModule>
<?php endif; ?>
