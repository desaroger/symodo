#!/bin/bash
set -e

composer install

php bin/console make:default-admin

./bin/fix-file-permission.sh
