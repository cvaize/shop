<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderService
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OrderServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderService extends Model
{
    use HasFactory;
}
