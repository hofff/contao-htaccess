<IfModule mod_rewrite.c>

	##
	# Activate the module
	##
	RewriteEngine On

	##
	# Set the RewriteBase
	##
	RewriteBase <?php echo $this->base; ?>

	##
	# Contao usually does not pass absolute URLs via GET, therefore the
	# following rules block all requests that try to pass a URL or the /etc/
	# directory as parameter (malicious requests).
	##
	RewriteCond %{REQUEST_URI} (ftp|https?):|/etc/ [NC,OR]
	RewriteCond %{QUERY_STRING} (ftp|https?):|/etc/ [NC]
	RewriteRule .* - [F,L]

	<?php if($this->redirectToHTTPS): ?>
	# Redirect HTTP to HTTPS
	RewriteCond %{HTTPS} !=on
	RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
	<?php endif; ?>

	##
	# Uncomment the following lines and replace "domain.com" with your domain
	# name to redirect requests without "www" to the correct domain.
	##
	<?php
	foreach ($this->prependWWW as $strDomain):
	?>RewriteCond %{HTTP_HOST} ^<?php echo preg_quote($strDomain); ?> [NC]
	RewriteRule (.*) http://www.<?php echo $strDomain; ?>/$1 [R=301,L]
	
	<?php
	endforeach;
	foreach ($this->removeWWW as $strDomain):
	?>RewriteCond %{HTTP_HOST} ^www\.<?php echo preg_quote($strDomain); ?> [NC]
	RewriteRule (.*) http://<?php echo $strDomain; ?>/$1 [R=301,L]

	<?php
	endforeach;
	if ($this->dynamicWWW == 'prepend'):
	?>
	# rewrite "example.com -> www.example.com"
	# Be aware that the following rule might not be a good idea if you
	# use "real" subdomains for certain parts of your website.

	RewriteCond %{HTTPS} !=on
	RewriteCond %{HTTP_HOST} !^www\..+$ [NC]
	RewriteRule ^ http://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

	RewriteCond %{HTTPS} =on
	RewriteCond %{HTTP_HOST} !^www\..+$ [NC]
	RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

	<?php
	endif;
	if ($this->dynamicWWW == 'remove'):
	?>
	# Rewrite "www.example.com -> example.com"

	RewriteCond %{HTTPS} !=on
	RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
	RewriteRule ^ http://%1%{REQUEST_URI} [R=301,L]

	RewriteCond %{HTTPS} =on
	RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
	RewriteRule ^ https://%1%{REQUEST_URI} [R=301,L]

	<?php
	endif;
	?>

	<?php echo $this->rules; ?>

	<?php echo $this->submodules; ?>

	##
	# If you cannot use mod_deflate, uncomment the following lines to load a
	# compressed .gz version of the bigger Contao JavaScript and CSS files.
	##
	<?php
	if ($this->gzip):
	?>AddEncoding gzip .gz
	<FilesMatch "\.js\.gz$">
		AddType "text/javascript" .gz
	</FilesMatch>
	<FilesMatch "\.css\.gz$">
		AddType "text/css" .gz
	</FilesMatch>
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{REQUEST_FILENAME} \.(js|css)$
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)$ $1.gz [QSA,L]
	<?php
	endif;
	?>

	##
	# Do not rewrite requests for static files or folders such as style sheets,
	# images, movies or text documents.
	##
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d

	##
	# By default, Contao adds ".html" to the generated URLs to simulate static
	# HTML documents. If you change the URL suffix in the back end settings, make
	# sure to change it here accordingly!
	##
	RewriteRule .*<?php if ($this->suffix): ?>\.<?php echo $this->suffix; ?>$<?php endif; ?> index.php [L]

</IfModule>
