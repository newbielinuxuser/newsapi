## NewsAPI prerequisite

Linux Distro - Ubuntu 18.04
Apache2
MySQL
PHP 7.1.3 or above
Redis
Composer
Npm/Node.js

Assuming if already have all the above software
## Step 1 - install/update composer packages
composer update
npm run dev

## Step 2 - Change .env file for database and configuration, look for the lines below and change accordingly
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
BROADCAST_DRIVER=redis
QUEUE_CONNECTION=redis

Assuming if starting from an empty server
## Step 1 - Installing Apache2
sudo apt update
sudo apt install apache2

Modify the apache2 config file
sudo nano /etc/apache2/sites-available/000-default.conf

Kindly look for these 3 lines and change it to web application folder name and save it
DocumentRoot /var/www/html/newsapi/public
ServerName example.com

<Directory /var/www/html/newsapi/public>

Enable url rewrite
sudo a2enmod rewrite

Restart apache2
service apache2 restart

## Step 2 - Install PHP7.1
sudo apt install php7.1 libapache2-mod-php7.1 php7.1-mbstring php7.1-xmlrpc php7.1-soap php7.1-gd php7.1-xml php7.1-cli php7.1-zip

After installing PHP, run the command below to modify the PHP configuration file.
sudo nano /etc/php/7.1/apache2/php.ini

Kindly look for the following lines below in the file and save.
memory_limit = 256M
upload_max_filesize = 64M
cgi.fix_pathinfo=0

## Step 3 - Install MySQL
sudo apt install mysql-server
sudo mysql_secure_installation

## Final Step - Setting up the permission
sudo chown -R www-data:www-data /var/www/html/newsapi/
sudo chmod -R 755 /var/www/html/newsapi/