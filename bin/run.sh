#!/bin/bash
set -e

./bin/start.sh
./bin/exec.sh $@
./bin/stop.sh
