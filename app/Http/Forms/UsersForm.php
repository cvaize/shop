<?php

namespace App\Http\Forms;

use App\Enums\UserStatus;
use App\Interfaces\ResourceForm;
use App\Models\Currency;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class UsersForm implements ResourceForm
{
    public function __construct(protected Request $request, protected Model $model)
    {
    }

    public function getValidateRules(): array
    {
        $s = $this->model->getKey() === null ? [] : ['sometimes'];
        return [
            'name'        => [...$s, 'nullable', 'string', 'min:1', 'max:255'],
            'email'       => [...$s, 'required', 'email', 'min:1', 'max:255'],
            'password'    => [...$s, 'nullable', 'string', 'min:1', 'max:255'],
            'language_id' => [...$s, 'nullable', 'numeric', 'exists:' . Language::class . ',id'],
            'currency_id' => [...$s, 'nullable', 'numeric', 'exists:' . Currency::class . ',id'],
            'status'      => [...$s, 'required', 'numeric', new Enum(UserStatus::class)],
            'superuser'   => [...$s, 'nullable', 'boolean'],
        ];
    }
}
