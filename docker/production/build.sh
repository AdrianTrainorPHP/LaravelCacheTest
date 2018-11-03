#!/bin/sh

GitBranch="master"

CurrentBranch="$(git symbolic-ref HEAD 2>/dev/null)"
CurrentBranch=${CurrentBranch##refs/heads/}

if [ "$CurrentBranch" != "$GitBranch" ]; then
  echo "ERROR: You must be on the \"$GitBranch\" branch in order to build. Typing \"git checkout $GitBranch\" should do the trick!"
  exit 1
fi

set -e

echo "***************************"
echo "*** Building Base Image ***"
echo "***************************"

docker-compose -f ../../docker-compose.yml build --no-cache base

echo "***************************"
echo "*** Building Core Image ***"
echo "***************************"

docker-compose build --no-cache core

echo "*******************************"
echo "*** Building Schedule Image ***"
echo "*******************************"

docker-compose build --no-cache schedule

echo "****************************"
echo "*** Building Queue Image ***"
echo "****************************"

docker-compose build --no-cache queue

echo "**************************"
echo "*** Building Web Image ***"
echo "**************************"

docker-compose build --no-cache web
