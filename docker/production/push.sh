#!/bin/bash

ECR=""

echo "Attempting to retrieve app version..."
Version="$(docker run -it --entrypoint=/usr/bin/php cachetest_web artisan app:version --no-ansi 2>/dev/null)"
Version=$(echo $Version | tr -d "\r")

set -e

echo "Logging into AWS ECR..."
LoginCmd=$(
    export AWS_ACCESS_KEY_ID="";
    export AWS_SECRET_ACCESS_KEY="";
    export AWS_DEFAULT_REGION="eu-west-1";
    cmd="$(aws ecr get-login --no-include-email)";
    cmd="${cmd//\-e none/}";
    echo $cmd;
);

eval $LoginCmd

echo "Tagging images..."
docker tag cachetest_schedule:latest $ECR/cachetest_schedule:latest
docker tag cachetest_queue:latest $ECR/cachetest_queue:latest
docker tag cachetest_web:latest $ECR/cachetest_web:latest

if [ ! -z "$Version" ]; then
    docker tag cachetest_schedule:latest $ECR/cachetest_schedule:$Version
    docker tag cachetest_queue:latest $ECR/cachetest_queue:$Version
    docker tag cachetest_web:latest $ECR/cachetest_web:$Version
fi

echo "Pushing schedule image..."
docker push $ECR/cachetest_schedule:latest
if [ ! -z "$Version" ]; then
    docker push $ECR/cachetest_schedule:$Version
fi

echo "Pushing queue image..."
docker push $ECR/cachetest_queue:latest
if [ ! -z "$Version" ]; then
    docker push $ECR/cachetest_queue:$Version
fi

echo "Pushing web image..."
docker push $ECR/cachetest_web:latest
if [ ! -z "$Version" ]; then
    docker push $ECR/cachetest_web:$Version
fi
