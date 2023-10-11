<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property int $type_id
 * @property string $value
 * @property string|null $decimal_value
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereDecimalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereValue($value)
 * @mixin \Eloquent
 */
class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'decimal_value',
        'pos',
        'status',
        'type_id',
        'value',
    ];
}
