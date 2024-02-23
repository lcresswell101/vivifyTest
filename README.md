# vivifyTest

composer install
npm install

cp .env.example .env

change
    DB_HOST=mysql
    DB_USERNAME=sail
    DB_PASSWORD=password
in .env

php artisan key:generate
npm run build

./vendor/bin/sail up -d
./vendor/bin/sail migrate --seed

run `phpunit` for tests

