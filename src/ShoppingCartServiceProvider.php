<?php

namespace Mirchaye\ShoppingCart;

use Mirchaye\ShoppingCart\Commands\ShoppingCartCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShoppingCartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        
        $package
            ->name('laravel-shopping-cart')
            ->hasConfigFile('shopping-cart')
            ->hasMigration('create_laravel-shopping-cart_table')
            ->hasCommand(ShoppingCartCommand::class);
    }
}
