[![Total Downloads](https://poser.pugx.org/zapsterstudios/crud-generator/downloads)](https://packagist.org/packages/zapsterstudios/crud-generator)
[![Latest Stable Version](https://poser.pugx.org/zapsterstudios/crud-generator/v/stable)](https://packagist.org/packages/zapsterstudios/crud-generator)
[![License](https://poser.pugx.org/zapsterstudios/crud-generator/license)](https://packagist.org/packages/zapsterstudios/crud-generator)

# Laravel-API-CRUD-Generator
This package generates all the needed files and snippets for a CRUD (Create, Read, Update and Delete) API endpoint.
This includes: Model, Migration, Controller, Routes and Policy (Used for restricting route access).
This package also takes care of validation with the $rules variable in the model.

##Usage
``php artisan make:crud SomeModelName``

## Installation
### Install with Composer
``composer require zapsterstudios/crud-generator``

### Register ServiceProvider
Add the following class to the ``providers`` array in ``config/app.php``.
``ZapsterStudios\CrudGenerator\PackageServiceProvider::class,``

### Handle Policy AuthorizationException
Add the following statement in the ``render`` function in ``app/Exceptions/Handler.php``.
``if($exception instanceof \Illuminate\Auth\Access\AuthorizationException) {
    if($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}``