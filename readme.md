# snatch test

This test contains a demonstration of unit testing, TDD development of a (slightly) crazy validation requirement,
methods to instantiate the environment (assuming docker exists), some .env examples and a laradock installation

## installation
git clone  --recurse-submodules git@github.com:powellblyth/snatch-test.git

#cd snatch-test

#cp laradockdotenv laradock/.env

#cp dotenv.example .env

Edit the .env to match your expected database (this code will not create your database)

#docker exec -it laradock_php-fpm_1 bash

#php artisan migrate

## dev-up
the dev-up _should_ build the environment up, assuming you have docker

## 

## runtests.sh 
This runs the unit test (s) in the project. There's only one, which is for demonstration purposes
I would expect more in a production project

