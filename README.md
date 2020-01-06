# csrf

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Simple CSRF implementation.

## Install

Via Composer

``` bash
$ composer require publishing-kit/csrf
```

You will also need to include one of the supported session libraries. Currently these are:

* `symfony/http-foundation`
* `laminas/laminas-session`

## Usage

Here is an example of using the library to create and validate a token using the Laminas backend:

``` php
$session = new Laminas\Session\Container();
$storage = new PublishingKit\Csrf\LaminasSessionTokenStorage($session);
$reader = new PublishingKit\Csrf\StoredTokenReader($storage);
$token = $reader->read('foo');
$validator = new PublishingKit\Csrf\StoredTokenValidator($storage);
$validator->validate('foo', $token);
```

And here we use the Symfony backend:

``` php
$session = new Symfony\Component\HttpFoundation\Session\Session(
    new Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage()
);
$storage = new PublishingKit\Csrf\SymfonySessionTokenStorage($session);
$reader = new PublishingKit\Csrf\StoredTokenReader($storage);
$token = $reader->read('foo');
$validator = new PublishingKit\Csrf\StoredTokenValidator($storage);
$validator->validate('foo', $token);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email 450801+matthewbdaly@users.noreply.github.com instead of using the issue tracker.

## Credits

- [Matthew Daly][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/publishing-kit/csrf.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/publishing-kit/csrf/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/publishing-kit/csrf.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/publishing-kit/csrf.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/publishing-kit/csrf.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/publishing-kit/csrf
[link-travis]: https://travis-ci.org/publishing-kit/csrf
[link-scrutinizer]: https://scrutinizer-ci.com/g/publishing-kit/csrf/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/publishing-kit/csrf
[link-downloads]: https://packagist.org/packages/publishing-kit/csrf
[link-author]: https://github.com/matthewbdaly
[link-contributors]: ../../contributors
