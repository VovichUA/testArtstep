sudo apt-get install php7.2-sqlite3 -y

sudo php composer.phar install

chmod -R 777 public/ && php -S localhost:8080 public/index.php