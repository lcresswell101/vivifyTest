# vivifyTest

composer install
<br />
npm install 
<br />
cp .env.example .env 
<br />
<br />
change
<br />
DB_HOST=mysql
<br />
DB_USERNAME=sail
<br />
DB_PASSWORD=password
<br />
in .env
<br />

php artisan key:generate
<br />
npm run build
<br />

./vendor/bin/sail up -d 
<br />
./vendor/bin/sail migrate --seed
<br />

run `phpunit` for tests

