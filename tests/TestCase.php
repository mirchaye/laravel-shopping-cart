<?php

namespace Mirchaye\ShoppingCart\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mirchaye\ShoppingCart\ShoppingCartServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mirchaye\\ShoppingCart\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ShoppingCartServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-shopping-cart_table.php.stub';
        $migration->up();
        */
    }
}
