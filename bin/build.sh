#!/bin/bash
set -e

cd laradock-symodo
docker-compose build --no-cache workspace nginx mongo
cd ..
