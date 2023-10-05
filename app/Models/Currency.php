<?php

namespace App\Models;

use App\Enums\CurrencyStatus;
use App\Interfaces\ValidateModel;
use App\ModelFilters\CommonFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

/**
 * App\Models\Currency
 *
 * @property int $id
 * @property string $code
 * @property string $label
 * @property string $exchange_rate
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Currency extends Model implements ValidateModel
{
    use HasFactory, Filterable;

    protected $fillable = [
        'code',
        'label',
        'exchange_rate',
        'status',
    ];

    public function getValidateRules(): array
    {
        $s = $this->getKey() === null ? [] : ['sometimes'];
        return [
            'code'          => [...$s, 'required', 'string', 'min:1', 'max:255'],
            'label'         => [...$s, 'required', 'string', 'min:1', 'max:255'],
            'exchange_rate' => [...$s, 'nullable', 'numeric', 'between:0,9999.9999'],
            'status'        => [...$s, 'required', 'numeric', new Enum(CurrencyStatus::class)],
        ];
    }

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
