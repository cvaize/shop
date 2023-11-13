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
 * App\Models\Locale
 *
 * @property int $id
 * @property int $language_id
 * @property int $currency_id
 * @property int $pos
 * @property int $status
 * @property int $default
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Locale newModelQuery()
 * @method static Builder|Locale newQuery()
 * @method static Builder|Locale query()
 * @method static Builder|Locale whereCreatedAt($value)
 * @method static Builder|Locale whereCurrencyId($value)
 * @method static Builder|Locale whereDefault($value)
 * @method static Builder|Locale whereId($value)
 * @method static Builder|Locale whereLanguageId($value)
 * @method static Builder|Locale wherePos($value)
 * @method static Builder|Locale whereStatus($value)
 * @method static Builder|Locale whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Locale extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'currency_id',
        'default',
        'language_id',
        'pos',
        'status',
    ];

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
