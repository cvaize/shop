<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\CurrencyStatus;
use App\Enums\UserStatus;
use App\Interfaces\ValidateModel;
use App\ModelFilters\CommonFilter;
use Database\Factories\UserFactory;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Enum;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $language_id
 * @property int|null $currency_id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property int $status
 * @property int $superuser
 * @property int $banned
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereBanned($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCurrencyId($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLanguageId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereSuperuser($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable implements ValidateModel
{
    use HasApiTokens, HasFactory, Notifiable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'language_id',
        'currency_id',
        'password',
        'status',
        'superuser',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function getValidateRules(): array
    {
        $s = $this->getKey() === null ? [] : ['sometimes'];
        return [
            'name'        => [...$s, 'nullable', 'string', 'min:1', 'max:255'],
            'email'       => [...$s, 'required', 'email', 'min:1', 'max:255'],
            'password'    => [...$s, 'nullable', 'string', 'min:1', 'max:255'],
            'language_id' => [...$s, 'nullable', 'numeric', 'exists:' . Language::class],
            'currency_id' => [...$s, 'nullable', 'numeric', 'exists:' . Currency::class],
            'status'      => [...$s, 'required', 'numeric', new Enum(UserStatus::class)],
            'superuser'   => [...$s, 'nullable', 'boolean'],
        ];
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function modelFilter()
    {
        return $this->provideFilter(CommonFilter::class);
    }
}
