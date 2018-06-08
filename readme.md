# Installation

The project contains standard installation of Laravel 5.5, however you'll need to install / update dependancies via composer:

```
composer install && composer update
```

We also need to install js dependancies - to do so run:

```
npm install
```

Laravel uses mix to compile assets - to compile js/css assets into public files run:

```
npm run prod
```

As the installation runs on SQLite database contained within a file, make sure that your Apache supports it. You'll also need to create the file itself by running

Linux
```
touch database\database.sqlite
```

or

Windows
```
copy nul database\database.sqlite
```

Finally run migrations to populate the database structure, by running:

```
php artisan migrate
```