# laravel-settings

<p align="center">
    <a href="https://packagist.org/packages/larva/laravel-settings"><img src="https://poser.pugx.org/larva/laravel-settings/v/stable" alt="Stable Version"></a>
    <a href="https://packagist.org/packages/larva/laravel-settings"><img src="https://poser.pugx.org/larva/laravel-settings/downloads" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/larva/laravel-settings"><img src="https://poser.pugx.org/larva/laravel-settings/license" alt="License"></a>
</p>

适用于 Laravel 的系统设置模块，适合保存一些不放在 ENV 中的设置，支持集群环境，无脏缓存。支持 Octane（加速引擎）。

## Installation

```bash
composer require larva/laravel-settings -vv
```


## 使用
```php
\Larva\Settings\Facade\Settings::get('abv');

\Larva\Settings\Facade\Settings::set('abv','123456');
```

## License

MIT
