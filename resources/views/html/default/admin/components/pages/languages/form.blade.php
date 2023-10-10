<?php
/** @var \App\Models\Currency $item */
/** @var \Illuminate\Support\ViewErrorBag $errors */
$item = $item ?? null;
$old = [];
$fields = ['status', 'label', 'code'];
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
    <label class="form-label" for="languages-create-status">{{ __('validation.attributes.status') }}</label>
    <select id="languages-create-status" class="form-select" name="status">
        @foreach(\App\Enums\LanguageStatus::values() as $statusId)
            <option
                value="{{ $statusId }}" @selected((string)(array_key_exists('status', $old) ? $old['status'] : $item?->status) === (string)$statusId)>
                {{ __('languages.status.' . $statusId) }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'status'])
</div>
<div class="form-group @isset($fieldsErrors['label']) has-error @endisset">
    <label class="form-label" for="languages-create-label">{{ __('validation.attributes.label') }}</label>
    <input name="label" class="form-input" type="text" id="languages-create-label"
           placeholder="{{ __('validation.attributes.label') }}" value="{{ array_key_exists('label', $old) ? $old['label'] : $item?->label }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'label'])
</div>
<div class="form-group @isset($fieldsErrors['code']) has-error @endisset">
    <label class="form-label" for="languages-create-code">{{ __('validation.attributes.code') }}</label>
    <input name="code" class="form-input" type="text" id="languages-create-code"
           placeholder="{{ __('validation.attributes.code') }}" value="{{ array_key_exists('code', $old) ? $old['code'] : $item?->code }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'code'])
</div>
