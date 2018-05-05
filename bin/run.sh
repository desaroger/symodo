#!/bin/bash
set -e

cd laradock-symodo
docker-compose run workspace $@
cd ..
