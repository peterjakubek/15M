#!/bin/bash

sudo apk update && sudo apk add nodejs npm

COMPOSER_MEMORY_LIMIT=-1 composer install
npm install
npm run install

php artisan migrate
php artisan dusk

echo "DB::table('users')->insert(['name'=>'MyUsername','email'=>'thisis@myemail.com','password'=>Hash::make('123456')])" | php artisan tinker
