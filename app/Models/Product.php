<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $status
 * @property int $type_id
 * @property string $slug
 * @property string $code
 * @property mixed|null $config
 * @property string $scale
 * @property string $rating
 * @property int $ratings
 * @property int $instock
 * @property string $boost
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBoost($value)
 * @method static Builder|Product whereCode($value)
 * @method static Builder|Product whereConfig($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereInstock($value)
 * @method static Builder|Product whereParentId($value)
 * @method static Builder|Product whereRating($value)
 * @method static Builder|Product whereRatings($value)
 * @method static Builder|Product whereScale($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereTypeId($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'boost',
        'code',
        'config',
        'instock',
        'parent_id',
        'rating',
        'ratings',
        'scale',
        'slug',
        'status',
        'type_id',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
