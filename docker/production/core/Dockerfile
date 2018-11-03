FROM cachetest_base:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

WORKDIR /var/www
RUN composer install --no-dev

COPY production/.env ./

RUN chown -R www-data:www-data /var/www
