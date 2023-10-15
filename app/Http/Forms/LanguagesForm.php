<?php

namespace App\Http\Forms;

use App\Enums\CommonStatus;
use App\Interfaces\ResourceForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class LanguagesForm implements ResourceForm
{
    public function __construct(protected Request $request, protected Model $model)
    {
    }

    public function getValidateRules(): array
    {
        $s = $this->model->getKey() === null ? [] : ['sometimes'];
        return [
            'code'          => [...$s, 'required', 'string', 'min:1', 'max:255'],
            'label'         => [...$s, 'required', 'string', 'min:1', 'max:255'],
            'status'        => [...$s, 'required', 'numeric', new Enum(CommonStatus::class)],
        ];
    }
}
