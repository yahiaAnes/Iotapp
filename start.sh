#!/bin/bash

# Wait for database to be ready (important for production)
while ! php artisan db:monitor > /dev/null 2>&1; do
    echo "Waiting for database connection..."
    sleep 1
done

# Run migrations and seeders
php artisan migrate --force
php artisan db:seed --force

# Start the application
php artisan serve --host=0.0.0.0 --port=9352