<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blueprint::macro('vector', function ($column): void {
            $this->addColumn('vector', $column);
        });

        PostgresGrammar::macro('typeVector', fn (): string => 'vector');
    }
}
