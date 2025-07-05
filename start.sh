#!/bin/sh
php artisan migrate --force --seed
exec php artisan serve --host=0.0.0.0 --port=9352
