<?php

namespace ZapsterStudios\CrudGenerator\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;

class CrudControllerMakeCommand extends ControllerMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'crud:controller';
    
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/controller.model.stub';
    }
}
