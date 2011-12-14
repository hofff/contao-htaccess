<?php if ($this->enabled): ?>
<IfModule mod_auth_basic.c>
	AuthType Basic
	AuthName "<?php echo $this->name; ?>"
	AuthUserFile "<?php echo $this->htusers; ?>"
	Require valid-user
<?php echo $this->submodules; ?>
</IfModule>
<?php endif; ?>
