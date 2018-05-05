#!/bin/bash
set -e

cd laradock-symodo
docker-compose exec workspace $@
cd ..
