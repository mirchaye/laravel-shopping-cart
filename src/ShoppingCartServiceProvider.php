<?php

namespace Mirchaye\ShoppingCart;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mirchaye\ShoppingCart\Commands\ShoppingCartCommand;

class ShoppingCartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-shopping-cart')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-shopping-cart_table')
            ->hasCommand(ShoppingCartCommand::class);
    }
}
