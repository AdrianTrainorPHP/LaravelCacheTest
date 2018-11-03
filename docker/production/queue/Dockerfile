FROM cachetest_core:latest
MAINTAINER Adrian Trainor <adriantrainor.developer@gmail.com>

RUN cp ./docker/common/queue/php.ini /etc/php/7.0/cli/php.ini

RUN cp ./docker/common/queue/args.txt /root/args.txt
RUN cp ./docker/common/queue/run.sh /root/run.sh
RUN chmod +x /root/run.sh

ENTRYPOINT ["/root/run.sh"]
