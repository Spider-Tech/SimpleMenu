#Simple Menu Laravel 

A quick and easy way to create menus in [Laravel 5](http://laravel.com/)

## Documentation

* [Installation](#installation)
* [Functionality](#functionality)
* [Todo](#todo)



## Installation


```bash
composer require lavary/laravel-menu
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


## Functionality

Yet to do


## Todo

* create config file for menu
* create a method in Facade to display the menu route
* create a menu in array with clidren etc
* assign the menu to default route 
* add comments to all files
* invoke BreadCrumbs 