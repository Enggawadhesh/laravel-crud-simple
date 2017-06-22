# laravel-crud-simple 5.4
Simple create retrieve update delete (CRUD) operation in Laravel PHP framework 5.4,
Here you can learn basic of laravel CRUD with Register, Login and Pagination. 
How CRUD worked in laravel with full comments in all files that's make batter to understand.
You can clone it or download it and run on your machin with 'php artisan serve' commend.

# Steps for running laravel application on localhost
(I am assumimg that you have installed xampp and composer, if not follow these steps)

Install xampp (https://www.apachefriends.org/download.html)

Install composer (https://getcomposer.org/download)

App Installation Steps-

-Download fresh laravel project via cmd/terminal with commend 'composer create-project laravel/laravel --prefer-dist' in your drive
1) Clone/Download App
2) Copy vendor folder from laravel and paste it in 'laravel-crud-simple' folder
3) Open cmd/terminal in laravel-crud-simple folder
4) Run 'php artisan serve' commend
5) You got development url copy this and paste in your browser
6) Now you have Laravel Welcome page
7) Create database in mysql with the name 'laravel-crud' (you can change it like you and also change "DB_DATABASE" in .env file in your root directory)
8) Your DB connection in .env file
9) In database/migrations folder all migraton available with comments
10) Open new cmd/terminal and goto laravel folder
11) Now run 'php artisan migrate' commend for create table
12) Now you can register and login
13) Register and login is default laravel scaffold, after installing laravel when you run 'php artisan make:auth' commend then you got it
14) Here you are able to Create Retrive Update Delete operation
15) Go to app folder see 'Crud' model
16) Go to app/Http/Controllers folder see 'CrudController'
17) Go to resources/views folder see home and welcome files
18) Go to resources/views/crud folder see crud blade files
19) Go to routes folder see web files for all routing
20) For more details visit at Laravel official website https://laravel.com/docs/5.4

For letest update follow me at Twitter- https://twitter.com/enggawadhesh
