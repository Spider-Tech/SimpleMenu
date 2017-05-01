# Simple Menu Laravel [![Build Status](https://travis-ci.org/Spider-Tech/SimpleMenu.svg?branch=master)](https://travis-ci.org/Spider-Tech/SimpleMenu) [![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/Spider-Tech/SimpleMenu/issues)

[![Latest Stable Version](https://poser.pugx.org/noob/simple_menu_laravel/v/stable)](https://packagist.org/packages/noob/simple_menu_laravel) [![Total Downloads](https://poser.pugx.org/noob/simple_menu_laravel/downloads)](https://packagist.org/packages/noob/simple_menu_laravel) [![Latest Unstable Version](https://poser.pugx.org/noob/simple_menu_laravel/v/unstable)](https://packagist.org/packages/noob/simple_menu_laravel) [![License](https://poser.pugx.org/noob/simple_menu_laravel/license)](https://packagist.org/packages/noob/simple_menu_laravel)


A quick and easy way to create menus in [Laravel 5](http://laravel.com/)

## Documentation

* [Installation](#installation)
* [Functionality](#functionality)
* [Todo](#todo)



## Installation


```bash
composer require noob/simple_menu_laravel
```

Now, append Laravel Menu service provider to `providers` array in `config/app.php`.


```php
<?php

'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        ...
        
            'noob\simple_menu_laravel\SimpleMenuServiceProvider::class',
        
        ...

],
?>
```

At the end of `config/app.php` add `'SimpleMenu'    => 'noob\simple_menu_laravel\SimpleMenuFacade'` to the `$aliases` array:

```php
<?php

'aliases' => [

    ...
    'SimpleMenu'       => 'noob\simple_menu_laravel\SimpleMenuFacade',

],
?>
```

This registers the package with Laravel and creates an alias called `SimpleMenu`.

Now publish the config files and view files to the appropriate directory

```bash
php artisan vendor:publish
```

Once published two new files are created at config/menu.php

```php
<?php

    'dash_board' => [
        'title' => 'dashboard',
        'url' => '/',
        'order' => 2,
        'children' => []
    ],
?>
```

and another one in the views folder at resources/views/Layouts/menu.blade.php
```php
To do
```



## Functionality

Yet to do


## Todo

* create view file for menu
* publish the view along with config file
* configure dynamic depth in view file
* create a method to return as html with essential classnames
* find active and check active is working
* add comments to all files
* invoke BreadCrumbs 
