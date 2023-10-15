<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Domain
 *
 * @property int $id
 * @property string|null $label
 * @property string $code
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain query()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Domain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Domain extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'code',
        'label',
        'pos',
        'status',
    ];

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
