FROM cachetest_base:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

COPY ./docker/common/schedule/crontab /etc/crontab
RUN chown root:root /etc/crontab

COPY ./docker/common/schedule/php.ini /etc/php/7.0/cli/php.ini

COPY ./docker/common/schedule/run.sh /root/run.sh
RUN chmod +x /root/run.sh

ENTRYPOINT ["/root/run.sh"]
