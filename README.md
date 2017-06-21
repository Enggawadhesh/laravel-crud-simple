# laravel-crud-simple 5.4
Simple create retrieve update delete (CRUD) operation in Laravel PHP framework 5.4,
Here you can learn basic of laravel CRUD with Register, Login and Pagination. 
How CRUD worked in laravel with full comments in all files that's make batter to understand.
You can clone it or download it and run on your machin with 'php artisan serve' commend.

# Steps for running laravel application on localhost
(I am assumimg that you have installed xampp and composer, if not follow these steps)

Install xampp (https://www.apachefriends.org/download.html)

Install composer (https://getcomposer.org/download)

Installation Steps-
1) Download App
2) Open cmd/terminal and goto laravel folder
3) Run 'php artisan serve' commend
4) You got development url copy this and paste in your browser
5) Now you have Laravel Welcome page
6) Create database in mysql with the name 'laravel-crud' (you can change it like you and also change "DB_DATABASE" in .env file in your root directory)
7) Your DB connection in .env file
8) In database/migrations folder all migraton available with comments
9) Open new cmd/terminal and goto laravel folder
10) Now run 'php artisan migrate' commend for create table
11) Now you can register and login
12) Register and login is default laravel scaffold, after installing laravel when you run 'php artisan make:auth' commend then you got it
13) Here you are able to Create Retrive Update Delete operation
14) Go to app folder see 'Crud' model
15) Go to app/Http/Controllers folder see 'CrudController'
16) Go to resources/views folder see home and welcome files
17) Go to resources/views/crud folder see crud blade files
18) Go to routes folder see web files for all routing
