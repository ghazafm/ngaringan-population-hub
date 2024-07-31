#!/usr/bin/expect -f

# Set the timeout for responses
set timeout -1

# Start the make:filament-user command
spawn php artisan make:filament-user

# Provide the name input
expect "Name"
send -- "admin\r"

# Provide the email address input
expect "Email address"
send -- "admin@ngaringan.com\r"

# Provide the password input
expect "Password"
send -- "admin123\r"

# Wait for the command to finish
expect eof
