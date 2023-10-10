<?php
/** @var \App\Models\Currency $item */
/** @var \Illuminate\Support\ViewErrorBag $errors */
$item = $item ?? null;
$old = [];
$fields = ['status', 'label', 'code', 'exchange_rate'];
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
    <label class="form-label" for="currencies-create-status">{{ __('validation.attributes.status') }}</label>
    <select id="currencies-create-status" class="form-select" name="status">
        @foreach(\App\Enums\CurrencyStatus::values() as $statusId)
            <option
                value="{{ $statusId }}" @selected((string)(array_key_exists('status', $old) ? $old['status'] : $item?->status) === (string)$statusId)>
                {{ __('currencies.status.' . $statusId) }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'status'])
</div>
<div class="form-group @isset($fieldsErrors['label']) has-error @endisset">
    <label class="form-label" for="currencies-create-label">{{ __('validation.attributes.label') }}</label>
    <input name="label" class="form-input" type="text" id="currencies-create-label"
           placeholder="{{ __('validation.attributes.label') }}" value="{{ array_key_exists('label', $old) ? $old['label'] : $item?->label }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'label'])
</div>
<div class="form-group @isset($fieldsErrors['code']) has-error @endisset">
    <label class="form-label" for="currencies-create-code">{{ __('validation.attributes.code') }}</label>
    <input name="code" class="form-input" type="text" id="currencies-create-code"
           placeholder="{{ __('validation.attributes.code') }}" value="{{ array_key_exists('code', $old) ? $old['code'] : $item?->code }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'code'])
</div>
<div class="form-group @isset($fieldsErrors['exchange_rate']) has-error @endisset">
    <label class="form-label" for="currencies-create-exchange_rate">{{ __('validation.attributes.exchange_rate') }}</label>
    <input name="exchange_rate" class="form-input" type="number"
           id="currencies-create-exchange_rate"
           placeholder="{{ __('validation.attributes.exchange_rate') }}"
           value="{{ array_key_exists('exchange_rate', $old) ? $old['exchange_rate'] : $item?->exchange_rate }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'exchange_rate'])
</div>
