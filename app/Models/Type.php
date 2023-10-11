<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property int $domain_id
 * @property string|null $label
 * @property string $code
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'domain_id',
        'label',
        'pos',
        'status',
    ];
}
