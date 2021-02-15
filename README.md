# laravel-settings

设置

[![Packagist](https://img.shields.io/packagist/l/larva/laravel-settings.svg?maxAge=2592000)](https://packagist.org/packages/larva/laravel-settings)
[![Total Downloads](https://img.shields.io/packagist/dt/larva/laravel-settings.svg?style=flat-square)](https://packagist.org/packages/larva/laravel-settings)


## Installation

```bash
composer require larva/laravel-settings -vv
```


## 使用
```php
\Larva\Settings\Facade\Settings::get('abv');

\Larva\Settings\Facade\Settings::set('abv','123456');
```
