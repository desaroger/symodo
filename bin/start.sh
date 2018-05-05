#!/bin/bash
set -e

cd laradock-symodo
docker-compose up -d workspace nginx mongo
docker-compose ps
cd -
