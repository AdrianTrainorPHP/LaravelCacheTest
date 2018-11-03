FROM cachetest_base:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

COPY ./docker/common/queue/php.ini /etc/php/7.0/cli/php.ini

COPY ./docker/common/queue/args.txt /root/args.txt
COPY ./docker/common/queue/run.sh /root/run.sh
RUN chmod +x /root/run.sh

ENTRYPOINT ["/root/run.sh"]
