#!/bin/bash

printenv | sed 's/^\(.*\)$/export \1/g' | grep -E "^export DB_" > /etc/crontab.env
cron -f
