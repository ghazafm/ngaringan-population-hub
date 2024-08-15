#!/bin/bash

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! mysqladmin ping -h"mysql" --silent; do
  sleep 1
done

echo "MySQL is ready."

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Check if the SEED_DATABASE environment variable is set to 'true'
if [ "${SEED_DATABASE}" = "true" ]; then
  echo "Seeding database..."
  php artisan db:seed --force
else
  echo "Skipping database seeding."
fi

echo "Creating admin user..."
php artisan tinker --execute="
use App\Models\User;
User::updateOrCreate(
    ['email' => 'admin@ngaringan.com'],
    [
        'name' => 'Admin',
        'usertype' => 'admin',
        'rt' => 1,
        'rw' => 1,
        'dusun' => 'gondoroso',
        'no_telp' => '1234567890',
        'email' => 'admin@ngaringan.com',
        'password' => bcrypt('adminuser')
    ]
);"

echo "Initialization complete."

#!/usr/bin/env bash

if [ "$SUPERVISOR_PHP_USER" != "root" ] && [ "$SUPERVISOR_PHP_USER" != "sail" ]; then
    echo "You should set SUPERVISOR_PHP_USER to either 'sail' or 'root'."
    exit 1
fi

if [ ! -z "$WWWUSER" ]; then
    usermod -u $WWWUSER sail
fi

if [ ! -d /.composer ]; then
    mkdir /.composer
fi

chmod -R ugo+rw /.composer

if [ $# -gt 0 ]; then
    if [ "$SUPERVISOR_PHP_USER" = "root" ]; then
        exec "$@"
    else
        exec gosu $WWWUSER "$@"
    fi
else
    exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
fi
