After cloning the repo run these commands to deploy project:

composer install

cp .env.example .env

php artisan key:generate

php artisan serve

Then open http://localhost:8000/home
