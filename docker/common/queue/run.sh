#!/bin/bash

/usr/bin/php /var/www/artisan queue:work --daemon `cat /root/args.txt`
