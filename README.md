# Installation

## Prerequisites
- Composer
- Node.js

## Windows
- Download and install WLS2
- Download and install Docker Desktop
- Refer to Laravel docs for setting up Sail (https://laravel.com/docs/9.x/sail)
- cd to repository path from terminal
- Run "sail composer install" and "sail npm install"
- Create environment file from ".env.example"
- Run "sail php artisan key:generate"
- Run "sail php artisan migrate:fresh --seed"

## MacOS
- Install Valet via Composer (https://laravel.com/docs/9.x/valet)
- Install MySQL/MariaDB via Homebrew
- cd to repository path from terminal
- Run "composer install" and "npm install"
- Create environment file from ".env.example"
- Run "php artisan key:generate"
- Run "php artisan migrate:fresh --seed"
