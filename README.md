# Lumen Blog

A simple Restful API blog developed using Lumen + jwt + auth  (micro framework by Laravel). The modules are users, posts & comments. After the authentication the user will be able to publish a new post or may write the comments under any post.

## Environment Configuraitons

To setup on your machine clone the repository and install the dependencies using php composer.
<pre>
composer install
</pre>

Setup the database configurations into .env file and run the databse migrations.
<pre>
php artisan migrate
</pre>

Run the database seed to fill up some data into users tables. The default user password is 123456
<pre>
php db:seed
</pre>

Run the application on your machine using the following command.
<pre>
php -S localhost:8000 -t public
</pre>

The implementation of the following API will be available over [here](https://lumen-blog.web.app) after a while.

## API Documentation
The endpoints documentation is available [here](https://www.getpostman.com/collections/83b2e142207e1d87b7c8). Import in the postman to check more details.