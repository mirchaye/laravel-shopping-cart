<?php

use Mirchaye\ShoppingCart\ShoppingCart;

expect()->extend('toBeApproximately', function ($expected, $precision = 0.0001) {
    return abs($this->value - $expected) <= $precision;
});

beforeEach(function () {
    config(['shopping-cart.tax_rate' => 8.5]); // Set the tax rate for the test
});

it('can add an item to the default cart', function () {
    $cart = new ShoppingCart();
    $itemData = ['id' => 1, 'name' => 'Product 1', 'price' => 10.99, 'quantity' => 2];

    $cart->addItem($itemData);

    expect($cart->getSubtotal())->toBe(21.98);
});

it('can remove an item from the default cart', function () {
    $cart = new ShoppingCart();
    $itemData = ['id' => 1, 'name' => 'Product 1', 'price' => 10.99, 'quantity' => 2];
    $cart->addItem($itemData);

    $cart->removeItem(1);

    expect($cart->getSubtotal())->toBe(0);
});

it('can update an item in a specific cart', function () {
    $cart = new ShoppingCart();
    $itemData = ['id' => 1, 'name' => 'Product 1', 'price' => 10.99, 'quantity' => 2];
    $cart->addItem($itemData);
    $newItemData = ['id' => 1, 'name' => 'Product 1 (Updated)', 'price' => 12.99, 'quantity' => 3];

    $cart->updateItem('default', 1, $newItemData);

    expect($cart->getSubtotal())->toBe(38.97);
});

it('can set and get the tax rate', function () {
    $cart = new ShoppingCart();
    $cart->setTaxRate(10);

    expect($cart->getTaxRate())->toBe(10);
});

it('can add an item with VAT', closure: function () {
    $cart = new ShoppingCart();
    $cart->setTaxRate(10);
    $itemData = ['id' => 1, 'name' => 'Product 1', 'price' => 10.99, 'quantity' => 2];

    $cart->addItemWithVAT($itemData);

    expect($cart->getTotal())->toBeApproximately(24.1978, 0.1)->toBeFloat(); // Adjust tolerance as needed
});

it('can add an item without VAT', function () {
    $cart = new ShoppingCart();
    $cart->setTaxRate(10);
    $itemData = ['id' => 1, 'name' => 'Product 1', 'price' => 10.99, 'quantity' => 2];

    $cart->addItemWithoutVAT($itemData);

    expect($cart->getTotal())->toBe(21.98);
});

it('throws an exception when trying to add an item with invalid data', function () {
    $cart = new ShoppingCart();
    $invalidItemData = ['id' => 1, 'name' => 'Product 1', 'quantity' => 2];

    $cart->addItem($invalidItemData);
})->throws(InvalidArgumentException::class);

it('can add an item to the wishlist cart', function () {
    $cart = new ShoppingCart();
    $itemData = ['id' => 2, 'name' => 'Product 2', 'price' => 19.99, 'quantity' => 1];

    $cart->addInstanceCart('wishlist', $itemData);

    expect($cart->getTotal())->toBe(19.99);
});

it('can change an item instance from default to wishlist cart', function () {
    $cart = new ShoppingCart();
    $itemData = ['id' => 3, 'name' => 'Product 3', 'price' => 5.99, 'quantity' => 3];

    $cart->addItem($itemData);
    $cart->changeCartItemInstance('default', 3, 'wishlist');

    expect($cart->getTotal())->toBe(17.97);
});
