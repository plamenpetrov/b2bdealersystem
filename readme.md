# B2B Dealer system

Laravel Framework based Busines to busines system. Provade flexible and user friendly mobile UI for: , , , nomenclatures and reports.
* Fast and easily create orders
* Sales
* Manage clients and related persons
* Nomenclatures
* Flexible reports
* Export data to excel

## Getting Started

Download files in your web server directory and extract them. Before you run application you need to have installed wamp server or any other web server pack. MySQL is also required.  

### Installing

Download files in your web server directory and extract them. Create database on MySQL and configure database credentials according to your local environment. Also you will need to install [Composer](https://getcomposer.org/download/) to proper manage project dependencies. 
In main directory create .env file and set:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DATABASE
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```

On main project directory start your console and run:

```
composer update
```

After successfully run this command you also need to run:
```
php artisan key:generate
```

You may need to configure and new virtual host on your web server to serve this project. After this configuration restart your server and load your project. You have to see login page where you can enter this credentials for admin access:
* username: demo
* password: test


## Built With

* [Laravel Framework](https://laravel.com)
* [Wamp](http://www.wampserver.com/en/) - Web development environment
* [Composer](https://getcomposer.org/download/) - A Dependency Manager for PHP

## Authors

* **Plamen Petrov** - [PlamenPetrov](https://github.com/plamenpetrov)

## License

This project is licensed under the MIT License.
