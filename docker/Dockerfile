FROM ubuntu:14.04
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y software-properties-common

RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

RUN apt-get update

RUN apt-get install -y apt-transport-https git php7.2-cli php7.2-curl php7.2-gd php7.2-mbstring php7.2-mysql php7.2-xml php7.2-zip

ADD ./docker/common/.ssh/* /root/.ssh/
RUN ssh-keyscan bitbucket.org >> /root/.ssh/known_hosts
RUN chmod -R 600 /root/.ssh/*

RUN echo "Europe/London" | tee /etc/timezone
RUN dpkg-reconfigure --frontend noninteractive tzdata

COPY ./docker/common/composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

COPY ./docker/common/phpunit-6.0.8.phar /usr/local/bin/phpunit
RUN chmod +x /usr/local/bin/phpunit

RUN mkdir /var/www
WORKDIR /var/www

RUN echo alias artisan=\"/usr/bin/php /var/www/artisan\" >> /etc/bash.bashrc

ENTRYPOINT ["/bin/true"]
