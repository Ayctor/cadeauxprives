# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ayctor/cadeauxprives.svg?style=flat-square)](https://packagist.org/packages/ayctor/cadeauxprives)
[![Build Status](https://img.shields.io/travis/ayctor/cadeauxprives/master.svg?style=flat-square)](https://travis-ci.org/ayctor/cadeauxprives)
[![Quality Score](https://img.shields.io/scrutinizer/g/ayctor/cadeauxprives.svg?style=flat-square)](https://scrutinizer-ci.com/g/ayctor/cadeauxprives)
[![Total Downloads](https://img.shields.io/packagist/dt/ayctor/cadeauxprives.svg?style=flat-square)](https://packagist.org/packages/ayctor/cadeauxprives)


This is where your description should go. Try and limit it to a paragraph or two.

## Installation

You can install the package via composer:

```bash
composer require ayctor/cadeauxprives
```

## Usage

``` php
$cp = new \Ayctor\Cadeauxprives\Cadeauxprives( $site_url, $site_id, $api_key );

$infos = $cp->updateUser([
    'email' => 'erwan@ayctor.com',
    'code_client' => 'erwan@ayctor.com',
    'nom' => 'Guillon',
    'prenom' => 'Erwan',
    'adresse' => [
        'rue' => '23, rue Sébastien Mercier',
        'cp' => '75015',
        'ville' => 'Paris',
        'code_iso' => 'FR',
    ],
]);
```

All fields are required by the API.

`$infos` contains an object with the token to login and the full URL to login the user.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

### Security

If you discover any security related issues, please email erwan@ayctor.com instead of using the issue tracker.

## Credits

- [Erwan Guillon](https://github.com/ErwanGuillon) @[Ayctor](https://ayctor.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
