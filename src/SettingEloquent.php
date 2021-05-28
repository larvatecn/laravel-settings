<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 数据模型
 * @property int $id
 * @property string $key
 * @property string $value
 * @property Carbon $updated_at 更新时间
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class SettingEloquent extends Model
{
    const CREATED_AT = null;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * 允许批量赋值的属性
     * @var array
     */
    public $fillable = [
        'key', 'value'
    ];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
    ];
}
