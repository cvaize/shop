<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property string $ref_type
 * @property int $ref_id
 * @property string|null $stocklevel
 * @property string|null $backdate
 * @property string|null $timeframe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\StockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBackdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereRefType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereStocklevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereTimeframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    use HasFactory;
}
