<?php
/** @var \App\Models\User $item */
/** @var \App\Models\Language $language */
/** @var \App\Models\Currency $currency */
/** @var \Illuminate\Support\ViewErrorBag $errors */
$item = $item ?? null;
$old = [];
$fields = ['status', 'type_id', 'code', 'slug'];
$fieldsErrors = [];

if (!isset($_action) || old('_action') === $_action) {
    foreach ($fields as $field) {
        $value = old($field, '1_NULL_1');
        if ($value !== '1_NULL_1') $old[$field] = $value;
        $errorsField = $errors->get($field);
        if (count($errorsField) > 0) $fieldsErrors[$field] = $errorsField;
    }
}
?>
@isset($_action)
    <input type="hidden" name="_action" value="{{ $_action }}">
@endisset
<div class="form-group @isset($fieldsErrors['status']) has-error @endisset">
    <label class="form-label" for="products-create-status">{{ __('validation.attributes.status') }}</label>
    <select id="products-create-status" class="form-select" name="status">
        @foreach(\App\Enums\CommonStatus::values() as $statusId)
            <option
                value="{{ $statusId }}" @selected((string)(array_key_exists('status', $old) ? $old['status'] : $item?->status) === (string)$statusId)>
                {{ __('status.' . $statusId) }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'status'])
</div>
<div class="form-group @isset($fieldsErrors['type_id']) has-error @endisset">
    <label class="form-label" for="products-create-type_id">{{ __('validation.attributes.type_id') }}</label>
    <select id="products-create-type_id" class="form-select" name="type_id">
        @foreach(\App\Enums\ProductType::values() as $typeId)
            <option
                value="{{ $typeId }}" @selected((string)(array_key_exists('type_id', $old) ? $old['type_id'] : $item?->type_id) === (string)$typeId)>
                {{ __('product.type_id.' . $typeId) }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'type_id'])
</div>
<div class="form-group @isset($fieldsErrors['code']) has-error @endisset">
    <label class="form-label" for="products-create-code">{{ __('validation.attributes.code') }}</label>
    <input name="code" class="form-input" type="text" id="products-create-code"
           placeholder="{{ __('validation.attributes.code') }}" value="{{ array_key_exists('code', $old) ? $old['code'] : $item?->code }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'code'])
</div>
<div class="form-group @isset($fieldsErrors['slug']) has-error @endisset">
    <label class="form-label" for="products-create-slug">{{ __('validation.attributes.slug') }}</label>
    <input name="slug" class="form-input" type="text" id="products-create-slug"
           placeholder="{{ __('validation.attributes.slug') }}" value="{{ array_key_exists('slug', $old) ? $old['slug'] : $item?->slug }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'slug'])
</div>
