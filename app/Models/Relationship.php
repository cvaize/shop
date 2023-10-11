<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Relationship
 *
 * @property int $id
 * @property int $type_id
 * @property string $parent_type
 * @property int $parent_id
 * @property string $relationship_type
 * @property int $relationship_id
 * @property int $pos
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereParentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereRelationshipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereRelationshipType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Relationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'parent_type',
        'pos',
        'relationship_id',
        'relationship_type',
        'status',
        'type_id',
    ];
}
