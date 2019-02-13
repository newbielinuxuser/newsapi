FROM ubuntu:18.04
MAINTAINER Jason Phoong <zphoong@yahoo.com>
LABEL Description="Dockerized Assignment for Mach-X" \
	License="Apache License 2.0" \
	Version="1.0"

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get -y install git zip unzip git nano tree curl cron apache2
RUN apt-get -y install mysql-server libmysqld-dev
RUN apt-get -y install php7.2
RUN apt-get -y install libapache2-mod-php7.2 php7.2-mbstring php7.2-xmlrpc php7.2-soap php7.2-gd php7.2-xml php7.2-cli php7.2-zip php7.2-mysql
RUN apt-get -y install composer redis-server build-essential supervisor
RUN chmod 755 -R /var/www/
RUN a2dissite 000-default.conf
RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt install -y nodejs
CMD echo "Nodejs version" && nodejs -v
CMD echo "Npm version" && npm -v

COPY . /var/www/html/newsapi/
COPY .env /var/www/html/newsapi/.env
RUN composer install
CMD php artisan key:gen
CMD npm install
CMD npm run dev
RUN npm install -g laravel-echo-server
#RUN ln -s /usr/bin/nodejs /usr/bin/node
RUN chown -R www-data:www-data /var/www/html/newsapi
COPY laravel.conf /etc/apache2/sites-enabled/laravel.conf
RUN php artisan migrate:fresh --seed
RUN touch /var/log/cron.log
RUN (crontab -l ; echo "*/15 * * * * php /var/www/html/newsapi/artisan articles:get >> /var/log/cron.log") | crontab
COPY supervisor.conf /etc/supervisor/conf.d/
CMD supervisorctl reread
CMD supervisorctl update
RUN a2enmod rewrite
RUN a2ensite laravel.conf
RUN service apache2 restart
EXPOSE 80
EXPOSE 3306