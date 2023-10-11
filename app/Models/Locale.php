<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Locale
 *
 * @property int $id
 * @property int $language_id
 * @property int $currency_id
 * @property int $pos
 * @property int $status
 * @property int $default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Locale extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'default',
        'language_id',
        'pos',
        'status',
    ];
}
