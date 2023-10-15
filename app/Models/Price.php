<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 * @method static Builder|Price whereCosts($value)
 * @method static Builder|Price whereCreatedAt($value)
 * @method static Builder|Price whereCurrencyId($value)
 * @method static Builder|Price whereId($value)
 * @method static Builder|Price wherePos($value)
 * @method static Builder|Price whereQuantity($value)
 * @method static Builder|Price whereRebate($value)
 * @method static Builder|Price whereStatus($value)
 * @method static Builder|Price whereTax($value)
 * @method static Builder|Price whereUpdatedAt($value)
 * @method static Builder|Price whereValue($value)
 * @mixin Eloquent
 */
class Price extends Model implements ResourceModel
{
    use HasFactory, Filterable;

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

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
