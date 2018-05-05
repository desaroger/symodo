#!/bin/bash
set -e

composer install

php bin/console make:default-admin
