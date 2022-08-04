Matchmaker task

The frontend for this project is very basic as the focus was on the backend skills

-   Download repo

-   Create a .env file containing

```lua

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:idahAb8TWnSyOZ41PDCFftal+WHG/yLbxILxzEWUw7I=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matchmaker
DB_USERNAME=root
DB_PASSWORD=

```

-   Make sure you have mysql installed. Create a database called 'matchmaker'

-   In your terminal/command line run composer install and npm install

-   To set up the database table run: php artisan migrate

-   To seed the database run: php artisan db:seed

-   In your terminal run: npm run dev

-   In another terminal run: php artisan serve

Tests

-   To execute tests: in the terminal run: ./vendor/bin/pest

Once finished you can remove the tables by running: php artisan migrate:reset
