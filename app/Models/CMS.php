<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use App\ModelFilters\CommonFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CMS
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CMS newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CMS newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CMS query()
 * @mixin \Eloquent
 */
class CMS extends Model implements ResourceModel
{
    use HasFactory, Filterable;

    public function modelFilter(): ?string
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
