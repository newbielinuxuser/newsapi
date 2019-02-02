## NewsAPI prerequisite

- Linux Distro - Ubuntu 18.04
- Apache2
- MySQL
- PHP 7.1.3 or above
- Redis
- Composer
- Npm/Node.js

## Starting by cloning this repository
```
git clone https://github.com/newbielinuxuser/newsapi.git
```

## Install any missing PHP packages
```
apt install php7.1 libapache2-mod-php7.1 php7.1-mbstring php7.1-xmlrpc php7.1-soap php7.1-gd php7.1-xml php7.1-cli
```

## Install/update composer packages
```
php7.1-zip
composer update
npm run dev
php artisan key:gen
```


## Change .env file for database and config, look for the lines below and change it to your database setting accordingly
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

Start laravel-echo-server
```
laravel-echo-server start
```

## Set your permission correctly
```
sudo chown -R www-data:www-data /var/www/html/newsapi/
sudo chmod -R 755 /var/www/html/newsapi/
```

## Build database
```
php artisan migrate:fresh --seed
```

## Add cronjob to get new articles every 15th minutes
```
*/15 * * * * php /var/www/html/newsapi/artisan articles:get
```

## Run job queue in background
```
php artisan queue:listen --tries=1
```
