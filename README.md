# Tailwindcss preset for Laravel >5.7

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is my Laravel preset to quickly get up and running in a new project
using [Tailwind CSS][link-tailwind]. The main part of this is
the templates I've redesigned using Tailwind.

I have "stolen" a few things from a few different presets I've looked at
and customised it to my preference.


## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [Screenshots](#screenshots)
- [Credits](#credits)
- [License](#license)


## Installation

First install this composer package in your fresh Laravel project:

``` bash
composer require scripturadesign/tailwindcss-laravel-preset
```

And run the preset script using:

``` bash
php artisan preset scriptura
```


## Screenshots

![Welcome](/screens/screen_welcome.png)

![Register](/screens/screen_register.png)

![Login](/screens/screen_login.png)

![Send Password Reset](/screens/screen_forgot.png)

![Reset Password](/screens/screen_reset.png)

![Dashboard](/screens/screen_dashboard.png)


## Contributing

I'm open to suggestions, but this is mainly made for my own usage so it might be a bit opinionated.


## Credits

- [Martin Dilling-Hansen][link-author]
- [All Contributors][link-contributors]


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/scripturadesign/tailwindcss-laravel-preset.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/scripturadesign/tailwindcss-laravel-preset.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/scripturadesign/tailwindcss-laravel-preset
[link-downloads]: https://packagist.org/packages/scripturadesign/tailwindcss-laravel-preset
[link-author]: https://github.com/martindilling
[link-contributors]: ../../contributors
[link-tailwind]: https://tailwindcss.com
