#!/bin/bash

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! mysqladmin ping -h"mysql" --silent; do
  sleep 1
done

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
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin',
        'usertype' => 'admin',
        'rt' => 1,
        'rw' => 1,
        'dusun' => 'gondoroso',
        'no_telp' => '1234567890',
        'email' => 'admin@ngaringan.com',
        'password' => bcrypt('adminpassword')
    ]
);"

echo "Initialization complete."

# Execute the main container command
exec "$@"
