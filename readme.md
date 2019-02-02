## NewsAPI prerequisite

- Linux Distro - Ubuntu 18.04
- Apache2
- MySQL
- PHP 7.2
- Redis
- Composer
- Npm/Node.js

## Starting by cloning this gist to install prerequisite
```
git clone https://gist.github.com/43163060d1b7b013fe811e5251439801.git
cd 43163060d1b7b013fe811e5251439801/
chmod +x install.sh
./install.sh
```

## Cloning this repository
```
cd /var/www/html/
git clone https://github.com/newbielinuxuser/newsapi.git
```

## Install/update composer packages
```
cd newsapi
cp .env.example .env
composer install
php artisan key:gen
npm install
npm run dev
```

## Create demo database in MySQL
```
echo "create database newsapi_db" | mysql -u root -p
```
By default password is empty if mysql_secure_installation not yet perform

## Change .env file for database and config, look for the lines below and change it to your database setting accordingly
```
DB_DATABASE=newsapi_db
DB_USERNAME=root
DB_PASSWORD=
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

## Set your permission correctly
```
sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/
```

## Build database
```
php artisan migrate:fresh --seed
```

## Add cronjob to get new articles every 15th minutes
```
*/15 * * * * php /var/www/html/newsapi/artisan articles:get
```

Start laravel-echo-server
open a new terminal
```
laravel-echo-server start
```

## Run job queue in background
open a new terminal
```
php artisan queue:listen --tries=1
```

Done! You may now view the websites at http://localhost:8000
