<?php

namespace ZapsterStudios\CrudGenerator\Commands;

use Illuminate\Support\Str;
use Illuminate\Foundation\Console\ModelMakeCommand;

class CrudModelMakeCommand extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'crud:model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));
        $modelName = $this->qualifyClass($this->getNameInput());
        $this->call('crud:controller', [
            'name'    => "{$controller}Controller",
            '--model' => $this->option('resource') ? $modelName : null,
        ]);
    }
}
