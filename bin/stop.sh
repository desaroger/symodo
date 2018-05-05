#!/bin/bash
set -e

cd laradock-symodo
docker-compose down
docker-compose ps
cd -
