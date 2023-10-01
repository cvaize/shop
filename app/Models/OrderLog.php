<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderLog
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OrderLogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderLog extends Model
{
    use HasFactory;
}
