# snatch test

This test contains a demonstration of unit testing, TDD development of a (slightly) crazy validation requirement,
methods to instantiate the environment (assuming docker exists), some .env examples and a laradock installation

## installation
git clone  --recurse-submodules git@github.com:powellblyth/snatch-test.git

#cd snatch-test

#cp laradockdotenv laradock/.env

#cp dotenv.example .env

Edit the .env to match your expected database (this code will not create your database)

#composer install


## dev-up
the dev-up _should_ build the environment up, assuming you have docker

#./dev-up

#docker exec -it laradock_php-fpm_1 bash

#php artisan migrate

#exit

## runtests.sh 

#./runtests.sh 

This runs the unit test (s) in the project. There's only one, which is for demonstration purposes
I would expect more in a production project

## My testing
I used the postman collection attached, snatch_postman_collection.json


## ERRATA
I'm not sure the phone number is unique. Pretty easy to extend the code to do this

Only one unit test - shows willing but not coverage

no User tests - No framework ,apologies