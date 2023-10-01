<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string $channel
 * @property string|null $invoiceno
 * @property string|null $date_payment
 * @property string|null $date_delivery
 * @property int $status_payment
 * @property int $status_delivery
 * @property string|null $cdate
 * @property string|null $cmonth
 * @property string|null $cweek
 * @property string|null $cwday
 * @property string|null $chour
 * @property int|null $language_id
 * @property int|null $currency_id
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereChour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCmonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCwday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCweek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDatePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInvoiceno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
}
