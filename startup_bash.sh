#!/usr/bin/env bash

# Set the timeout for responses
timeout=-1

# Start the make:filament-user command
expect << EOF
spawn php artisan make:filament-user

# Provide the name input
expect "Name"
send "admin\r"

# Provide the email address input
expect "Email address"
send "admin@ngaringan.com\r"

# Provide the password input
expect "Password"
send "admin123\r"

# Wait for the command to finish
expect eof
EOF
