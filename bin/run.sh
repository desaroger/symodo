#!/bin/bash
set -e

cd laradock-symodo
docker-compose run workspace $@
docker-compose down > /dev/null 2>&1
cd ..
