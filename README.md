# Homework assignment
## Requirements
1. [x] PHP 8.0 minimum.
2. [x] Composer.
4. [x] Enable cURL PHP extension

### Setup project in localhost
- Project url in github `https://github.com/pk70/disseminarebd-task.git`
- Download file from git or `git clone https://github.com/pk70/disseminarebd-task.git`
- Go to project folder and open terminal
- Run command `composer update`
- Make sure .env file is in root folder
- Run command `php artisan key:generate` for generating encrypted key
- Run command `php artisan migrate` for generating database table
- Run command `php artisan db:seed` for generating encrypted key
- Run command `php artisan serve` you will see url `http://127.0.0.1:8000/`

### Technology used
- Laravel framework version 10
- Bootstrap 5

