FROM cachetest_base:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

RUN apt-get update

RUN apt-get install -y apache2 libapache2-mod-php7.2

COPY ./docker/common/web/httpd.conf /etc/apache2/sites-available/000-default.conf
COPY ./docker/common/web/php.ini /etc/php/7.0/apache2/php.ini

COPY ./docker/common/web/run.sh /root/run.sh
RUN chmod +x /root/run.sh

RUN a2enmod rewrite
RUN rm -rf /var/www/html
RUN update-rc.d -f apache2 remove

EXPOSE 80

ENTRYPOINT ["/root/run.sh"]
