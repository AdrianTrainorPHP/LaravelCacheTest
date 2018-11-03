FROM cachetest_core:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

RUN cp ./docker/common/schedule/crontab /etc/crontab
RUN chown root:root /etc/crontab

RUN cp ./docker/common/schedule/php.ini /etc/php/7.0/cli/php.ini

RUN cp ./docker/common/schedule/run.sh /root/run.sh
RUN chmod +x /root/run.sh

ENTRYPOINT ["/root/run.sh"]
