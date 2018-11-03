#!/bin/bash

TARGET_USER="www-data"
TARGET_GROUP="www-data"
TARGET_UID=$(stat -c "%u" /var/www)
TARGET_GID=$(stat -c "%g" /var/www)

if [ $TARGET_UID != 0 ]; then
    echo '*** Setting' $TARGET_USER 'user to use uid' $TARGET_UID
    usermod -o -u $TARGET_UID $TARGET_USER || true
fi

if [ $TARGET_GID != 0 ]; then
    echo '*** Setting' $TARGET_GROUP 'group to use gid' $TARGET_GID
    groupmod -o -g $TARGET_GID $TARGET_GROUP || true
fi

/root/run.sh
