<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Price
 *
 * @property int $id
 * @property int $currency_id
 * @property string $quantity
 * @property string $value
 * @property string $costs
 * @property string $rebate
 * @property string $tax
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereRebate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereValue($value)
 * @mixin \Eloquent
 */
class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'costs',
        'currency_id',
        'pos',
        'quantity',
        'rebate',
        'status',
        'tax',
        'value',
    ];
}
