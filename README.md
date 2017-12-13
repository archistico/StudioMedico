# Route

Implementazione gestione route con coda in mysql.

## Install

1. Copia i file nel tuo server
2. Crea un db chiamato `appuntamenti` e inviagli `*.sql` 
3. mysql -u root -p '' appuntamenti < nome.sql
4. Sistema i dati di accesso in `config.php`

## Server

.htaccess file  

```apacheconf
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond $1 !^(index\.php)
RewriteRule ^(.*)$ /index.php/$1 [L]
```

cd /etc/apache2/sites-available/
sudo cp 000-default.conf 001-appuntamenti.conf
sudo nano 001-appuntamenti.conf

```apacheconf
<VirtualHost *:80>
	
	ServerName base.local
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html/base
	
	<Directory /var/www/html/base>
	    Options Indexes FollowSymLinks MultiViews
	    AllowOverride All
	    Order allow,deny
	    allow from all
	</Directory>
</VirtualHost>
```

sudo a2ensite 001-appuntamenti.conf
sudo service apache2 reload

## Credit
  
Basato su:
- [base](https://github.com/archistico/base)
- [ToroPHP](https://github.com/anandkunal/ToroPHP)
