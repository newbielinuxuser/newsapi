## NewsAPI prerequisite

- Linux Distro - Ubuntu 18.04
- Apache2
- MySQL
- PHP 7.2
- Redis
- Composer
- Npm/Node.js
- Supervisor
- Webpack mix

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
echo "create database newsapi_db; GRANT ALL PRIVILEGES ON newsapi_db.* TO 'username'@'localhost' IDENTIFIED BY 'password'; flush privileges;" | mysql -u root -p
```
By default password is empty if mysql_secure_installation not yet perform

## Change .env file for database and config
```
nano .env
```

## Look for the code below and change accordingly
```
DB_DATABASE=newsapi_db
DB_USERNAME=username
DB_PASSWORD=password
BROADCAST_DRIVER=redis
QUEUE_CONNECTION=redis
```

## Install laravel-echo-server 
```
npm install -g laravel-echo-server
```

After installing, run initial for first time setup
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

## Build database
```
php artisan migrate:fresh --seed
```

## Add cronjob to get new articles every 15th minutes
```
crontab -e
```

And paste the below code at the end of the line
```
*/15 * * * * php /var/www/html/newsapi/artisan articles:get
```

## Adding background job into supervisor
```
cd /etc/supervisor/conf.d/
nano newsapi.conf
```
Copy and paste the following codes into newsapi.conf and save it
```
[program:laravel-queue]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/html/newsapi/artisan queue:listen --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/html/newsapi/storage/logs/queue.log

[program:laravel-echo]
process_name=%(program_name)s_%(process_num)02d
directory=/var/www/html/newsapi
command=/usr/bin/laravel-echo-server start
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/html/newsapi/storage/logs/echo.log
```
Reread and update supervisor
```
supervisorctl reread
supervisorctl update
```

## Configure Apache2 and point it to the correct folder
```
sudo nano /etc/apache2/sites-available/laravel.conf
```
Copy and paste the below codes into laravel.conf
```
<VirtualHost *:80>   
  ServerAdmin admin@example.com
     DocumentRoot /var/www/html/newsapi/public
     ServerName example.com

     <Directory /var/www/html/newsapi/public>
        Options +FollowSymlinks
        AllowOverride All
        Require all granted
     </Directory>

     ErrorLog ${APACHE_LOG_DIR}/error.log
     CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
Enable the config above and enable url rewrite
```
sudo a2ensite laravel.conf
sudo a2enmod rewrite
```

Restart apache2
```
service apache2 restart
```

## Finally set your permission correctly
```
sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/
```

### Note
- newsapi.org free tier api key will delay 15 minutes.
- You might want to change your api key at app/Console/Command/GetArticles.php @ line 50
- News article will append in the websites at realtime.
- Only fetching all categories from 3 countries, add more countries at app/Console/Command/GetArticles.php @ line 46
- Working on Dockerfile for ease of deployment

Done! You may now view the website application at http://your-server-ip/ and the specific assessment given at http://your-server-ip/assessment



