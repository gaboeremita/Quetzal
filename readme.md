# Quetzal

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

Quetzal is an ConstantContact integration package for Laravel. 
My plan is to expand to other mailing services such as Mailchimp and include a much more robust API. 

Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require gaboeremita/quetzal
```

## Usage

Instantiate the class with your desired Mailinglist service (Currently ConstantContact is the only one supported)

``` php
$constantContact = new ConstantContact();
```

Then you can create a new list like this:

``` php
$newList = Quetzal::createList($constantContact, 'Example list');

```

You can also add contacts to a list:

``` php
Quetzal::addContactToList($constantContact, $newList->id, 'test@test.com', 'Test', 'McTestyFace');

```

And finally you can get all the contacts from a list:

``` php
$contacts = Quetzal::getContactsFromList($constantContact, $newList->id);

```

Expect more functionality soon!

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- Me

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gaboeremita/quetzal.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gaboeremita/quetzal.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gaboeremita/quetzal/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/gaboeremita/quetzal
[link-downloads]: https://packagist.org/packages/gaboeremita/quetzal
[link-travis]: https://travis-ci.org/gaboeremita/quetzal
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/gaboeremita
[link-contributors]: ../../contributors
