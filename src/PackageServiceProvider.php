<?php

namespace ZapsterStudios\CrudGenerator;

use Illuminate\Support\ServiceProvider;
use ZapsterStudios\CrudGenerator\Commands\CrudGeneratorCommand;
use ZapsterStudios\CrudGenerator\Commands\CrudModelMakeCommand;
use ZapsterStudios\CrudGenerator\Commands\CrudControllerMakeCommand;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudGeneratorCommand::class,
                CrudModelMakeCommand::class,
                CrudControllerMakeCommand::class,
            ]);
        }
    }
}
