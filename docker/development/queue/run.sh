#!/bin/bash

/usr/bin/php /var/www/artisan queue:listen `cat /root/args.txt`
