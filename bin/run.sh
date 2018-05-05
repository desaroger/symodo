#!/bin/bash
set -e

#./bin/start.sh
#./bin/exec.sh $@
#./bin/stop.sh

cd laradock-symodo
docker-compose run workspace $@
cd ..
