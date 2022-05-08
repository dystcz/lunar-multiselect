# Multiselect field type for getcandy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dystcz/getcandy-multiselect.svg?style=flat-square)](https://packagist.org/packages/dystcz/getcandy-multiselect)
[![Total Downloads](https://img.shields.io/packagist/dt/dystcz/getcandy-multiselect.svg?style=flat-square)](https://packagist.org/packages/dystcz/getcandy-multiselect)
![GitHub Actions](https://github.com/dystcz/getcandy-multiselect/actions/workflows/main.yml/badge.svg)

Multiselect field that allows saving of multiple values at once. Multiselect options are filled the same way as the Dropdown field which is already in the core.

## Installation

You can install the package via composer:

```bash
composer require dystcz/getcandy-multiselect
```

## Usage

Just require this package and the multiselect field will appear in the getcandy admin hub. It registers itself automatically.

## TODO

- [x] Find out how to solve the @wireUiScripts problem (where to include the script)
- [ ] Make select configurable with all its options
- [x] Do not rely on WireUI for the multiselect component (can be used to skip first todo)
- [ ] Unit tests

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jakub@dy.st instead of using the issue tracker.

## Credits

-   [Jakub Theimer](https://github.com/theimerj)
-   [Jakub Večeřa](https://github.com/veceraj)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

