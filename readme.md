## NewsAPI prerequisite

Linux Distro - Ubuntu 18.04
Apache2
MySQL
PHP 7.1.3 or above
Redis
Composer
Npm/Node.js

## Starting by cloning this repository
```
https://github.com/newbielinuxuser/newsapi.git
```

## Install/update composer packages
```
composer update
npm run dev
php artisan key:gen
```

## Change .env file for database and config, look for the lines below and change accordingly
```
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
BROADCAST_DRIVER=redis
QUEUE_CONNECTION=redis
```

## Install laravel-echo-server 
```
npm install -g laravel-echo-server
```

After installing, kindly run initial for first time setup
```
laravel-echo-server init
? Do you want to run this server in development mode? No
? Which port would you like to serve from? 6001
? Which database would you like to use to store presence channel members? redis
? Enter the host of your Laravel authentication server. http://localhost
? Will you be serving on http or https? http
? Do you want to generate a client ID/Key for HTTP API? No
? Do you want to setup cross domain access to the API? No
? What do you want this config to be saved as? laravel-echo-server.json
```

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