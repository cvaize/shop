<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Text
 *
 * @property int $id
 * @property int $type_id
 * @property int $language_id
 * @property string|null $content
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Text newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Text newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Text query()
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Text extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'content',
        'language_id',
        'pos',
        'status',
        'type_id',
    ];

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
