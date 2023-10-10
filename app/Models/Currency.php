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
 * App\Models\Currency
 *
 * @property int $id
 * @property string $code
 * @property string $label
 * @property string $exchange_rate
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Currency newModelQuery()
 * @method static Builder|Currency newQuery()
 * @method static Builder|Currency query()
 * @method static Builder|Currency whereCode($value)
 * @method static Builder|Currency whereCreatedAt($value)
 * @method static Builder|Currency whereExchangeRate($value)
 * @method static Builder|Currency whereId($value)
 * @method static Builder|Currency whereLabel($value)
 * @method static Builder|Currency whereStatus($value)
 * @method static Builder|Currency whereUpdatedAt($value)
 * @method static Builder|Currency filter(array $input = [], $filter = null)
 * @method static Builder|Currency paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Currency simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Currency whereBeginsWith($column, $value, $boolean = 'and')
 * @method static Builder|Currency whereEndsWith($column, $value, $boolean = 'and')
 * @method static Builder|Currency whereLike($column, $value, $boolean = 'and')
 * @mixin Eloquent
 */
class Currency extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'code',
        'label',
        'exchange_rate',
        'status',
    ];

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
