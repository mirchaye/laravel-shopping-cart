# Simple laravel shopping cart package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mirchaye/laravel-shopping-cart.svg?style=flat-square)](https://packagist.org/packages/mirchaye/laravel-shopping-cart)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mirchaye/laravel-shopping-cart/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mirchaye/laravel-shopping-cart/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mirchaye/laravel-shopping-cart/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mirchaye/laravel-shopping-cart/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mirchaye/laravel-shopping-cart.svg?style=flat-square)](https://packagist.org/packages/mirchaye/laravel-shopping-cart)

This **Shopping Cart Package** is a versatile and user-friendly shopping cart solution for Laravel applications. It empowers developers to effortlessly integrate a shopping cart system into their e-commerce projects. 

### :heavy_plus_sign: Features:

- **Easy Cart Management**: Add, update, and remove items from the cart with simple and intuitive methods.
- **Multiple Instances**: Create multiple instances of the cart, each with its own set of items, catering to different requirements.
- **Flexible VAT Handling**: Support for items with or without VAT, giving you control over tax calculations.
- **Custom Tax Rate**: Set the tax rate for the cart to ensure accurate tax calculation based on your region or business rules.
- **Convenient Totals**: Get total, subtotal, and tax amounts with ease, making it a breeze to display accurate cart summaries.
- **Comprehensive Testing**: The package comes with a robust suite of unit tests, ensuring reliable and bug-free functionality.


## Installation

You can install the package via composer:

```bash
composer require mirchaye/laravel-shopping-cart
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-shopping-cart-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-shopping-cart-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-shopping-cart-views"
```

## Usage

```php
$shoppingCart = new Mirchaye\ShoppingCart();
echo $shoppingCart->echoPhrase('Hello, Mirchaye!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Micheal Ataklt](https://github.com/mirchaye)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
