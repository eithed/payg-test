#Installation

The project contains standard installation of Laravel 5.5, however you'll need to install / update dependancies via composer:

```
composer install && composer update
```

You'll also need to generate css/js files from the assets via Laravel's mix - to do so run:

```
npm run prod
```

As the installation runs on SQLite database contained within a file, make sure that your Apache supports it. You'll also need to create the file itself by running

```
touch database\database.sqlite
```

or

```
copy con 