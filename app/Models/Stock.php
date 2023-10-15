<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property string $ref_type
 * @property int $ref_id
 * @property string|null $stocklevel
 * @property string|null $backdate
 * @property string|null $timeframe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBackdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereRefType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereStocklevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereTimeframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stock extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'backdate',
        'ref_id',
        'ref_type',
        'stocklevel',
        'timeframe',
    ];

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
