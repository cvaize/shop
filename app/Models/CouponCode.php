<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponCode
 *
 * @property int $id
 * @property int $coupon_id
 * @property string $code
 * @property int $count
 * @property string|null $start
 * @property string|null $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CouponCodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponCode extends Model
{
    use HasFactory;
}
