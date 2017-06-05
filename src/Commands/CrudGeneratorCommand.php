<?php

namespace ZapsterStudios\CrudGenerator\Commands;

use Illuminate\Console\Command;

class CrudGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API CRUD bootstrap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Variables
        $name = $this->argument('name');
        $routesPath = base_path('routes/api.php');
        $policiesPath = app_path('Providers/AuthServiceProvider.php');

        // Model, Migration and Controller
        $this->call('crud:model', [
            'name' => $name,
            '-m'   => true,
            '-c'   => true,
            '-r'   => true,
        ]);

        // Route
        $routes = file_get_contents($routesPath);
        $routes .= "\n\n"."Route::apiResource('/".strtolower($name)."', '{$name}Controller');";
        file_put_contents($routesPath, $routes);

        $this->info('API route appended successfully.');

        // Policy
        $this->call('make:policy', [
            'name' => $name.'Policy',
            '-m'   => $name,
        ]);

        // Policies
        $policies = file_get_contents($policiesPath);
        $policies = str_replace(
            '$policies = [',
            '$policies = ['."\n        'App\\".$name."' => 'App\Policies\\".$name."Policy',",
            $policies
        );
        file_put_contents($policiesPath, $policies);
    }
}
