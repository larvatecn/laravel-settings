<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Settings;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Larva\Settings\Contracts\SettingsRepository;

/**
 * 设置管理
 * @package Larva\Settings
 */
class SettingsManager implements SettingsRepository
{
    const CACHE_TAG = "settings";

    /**
     * The container instance.
     *
     * @var Container
     */
    protected $container;

    /**
     * @var Collection
     */
    protected $settings = null;

    /**
     * Create a new instance.
     *
     * @param Container $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * 获取所有的设置
     * @return Collection
     */
    public function all(bool $reload = false)
    {
        if ($settings = Cache::get(static::CACHE_TAG) == null || $reload) {
            $settings = [];
            SettingEloquent::all()->each(function ($setting) use (&$settings) {
                Arr::set($settings, $setting['key'], $setting['value']);
            });
            Cache::forever(static::CACHE_TAG, $settings);
        }
        $this->settings = collect($settings);
        return $this->settings;
    }

    /**
     * 指定的设置是否存在
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key)
    {
        return Arr::has($this->all(), $key);
    }

    /**
     * 获取设置
     * @param string $key
     * @param string|null $default
     * @return string
     */
    public function get(string $key, string $default = null)
    {
        return Arr::get($this->all(), $key, $default);
    }

    /**
     * 获取设置组
     * @param string $section
     * @return array
     */
    public function section(string $section)
    {
        return Arr::get($this->all(), $section);
    }

    /**
     * 保存设置
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function set(string $key, string $value)
    {
        if (is_array($value)) {
            return false;
        }
        //写库
        $query = SettingEloquent::query()->where('key', '=', $key);
        $method = $query->exists() ? 'update' : 'insert';
        $query->$method(compact('key', 'value'));
        $this->all(true);//重载
        return true;
    }

    /**
     * 删除设置
     * @param string $key
     * @return true
     */
    public function forge(string $key)
    {
        SettingEloquent::query()->where('key', '=', $key)->delete();
        $this->all(true);//重载
        return true;
    }
}
