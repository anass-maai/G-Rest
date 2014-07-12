
1 - ajoutez le rep : G-Rest à www/

2 - dans le fichier  httpd.conf de apache il faut activer cette rewrite_module , ligne  :
    LoadModule rewrite_module modules/mod_rewrite.so

3 - le fichier .htaccess doit contenur les ligne suivantes :
        ---------------------
        Options -Indexes

        RewriteEngine On
        RewriteBase /G-Rest

        #comment out to keep trailing slashes
        RewriteRule ^(.+)/$ $1 [R=301,L]

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f

        RewriteRule ^(.*)$ index.php?$1 [L]

        ---------------------