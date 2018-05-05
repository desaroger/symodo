#!/bin/bash
set -e

composer install

./bin/fix-file-permission.sh

php bin/console make:default-admin

