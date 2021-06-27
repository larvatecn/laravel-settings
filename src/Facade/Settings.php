<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Settings\Facade;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Larva\Settings\Contracts\SettingsRepository;
use Larva\Settings\SettingsManager;

/**
 * @method static Collection all()
 * @method static boolean has($key)
 * @method static mixed get($key, $default = null)
 * @method static array section($section)
 * @method static boolean set($key, $value, $cast_type = 'string')
 * @method static boolean forge($key)
 * @mixin SettingsManager
 */
class Settings extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SettingsRepository::class;
    }
}
