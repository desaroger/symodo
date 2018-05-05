#!/bin/bash
set -e

# Initialize laradock submodule
git submodule init
git submodule update

# Initialize laradock .env file
if [ ! -f laradock-symodo/.env ]; then
    cp .env-laradock.dist laradock-symodo/.env
fi

# Patch laradock so workspace depends on mongo
patch -p0 < docker/docker-compose.depends-on.patch

# Build docker images
./bin/build.sh

# Initialize inside container
./bin/run.sh ./bin/docker-initialize.sh
