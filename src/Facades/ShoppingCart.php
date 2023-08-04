<?php

namespace Mirchaye\ShoppingCart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mirchaye\ShoppingCart\ShoppingCart
 */
class ShoppingCart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mirchaye\ShoppingCart\ShoppingCart::class;
    }
}
