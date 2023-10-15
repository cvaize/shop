<?php

namespace App\Http\Forms;

use App\Enums\CommonStatus;
use App\Interfaces\ResourceForm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ProductsForm implements ResourceForm
{
    public function __construct(protected Request $request, protected Model $model)
    {
    }

    public function getValidateRules(): array
    {
        $s = $this->model->getKey() === null ? [] : ['sometimes'];
        return [
            'boost'   => [...$s, 'required', 'numeric'],
            'code'    => [...$s, 'required', 'string', 'min:1', 'max:255', 'unique:' . Product::class],
            'config'  => [...$s, 'nullable', 'json'],
            'scale'   => [...$s, 'required', 'numeric'],
            'slug'    => [...$s, 'nullable', 'string', 'min:1', 'max:255', 'unique:' . Product::class],
            'status'  => [...$s, 'required', 'numeric', new Enum(CommonStatus::class)],
            'type_id' => [...$s, 'nullable', 'numeric', 'exists:' . Type::class . ',id'],

        ];
    }
}
