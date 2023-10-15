<?php
/** @var \App\Models\User $item */
/** @var \App\Models\Language $language */
/** @var \App\Models\Currency $currency */
/** @var \Illuminate\Support\ViewErrorBag $errors */
$item = $item ?? null;
$old = [];
$fields = ['status', 'name', 'email', 'currency_id', 'language_id'];
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
<div class="form-group @isset($fieldsErrors['name']) has-error @endisset">
    <label class="form-label" for="products-create-name">{{ __('validation.attributes.name') }}</label>
    <input name="name" class="form-input" type="text" id="products-create-name"
           placeholder="{{ __('validation.attributes.name') }}" value="{{ array_key_exists('name', $old) ? $old['name'] : $item?->name }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'name'])
</div>
<div class="form-group @isset($fieldsErrors['email']) has-error @endisset">
    <label class="form-label" for="products-create-email">{{ __('validation.attributes.email') }}</label>
    <input name="email" class="form-input" type="text" id="products-create-email"
           placeholder="{{ __('validation.attributes.email') }}" value="{{ array_key_exists('email', $old) ? $old['email'] : $item?->email }}">
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'email'])
</div>
<div class="form-group @isset($fieldsErrors['currency_id']) has-error @endisset">
    <label class="form-label" for="products-create-currency_id">{{ __('validation.attributes.currency_id') }}</label>
    <select id="products-create-currency_id" class="form-select" name="currency_id">
        <option value="" @selected((string)(array_key_exists('currency_id', $old) ? $old['currency_id'] : $item?->currency_id) === (string)null)>
            Не выбрано
        </option>
        @foreach($currencies as $currency)
            <option
                value="{{ $currency->getKey() }}" @selected((string)(array_key_exists('currency_id', $old) ? $old['currency_id'] : $item?->currency_id) === (string)$currency->getKey())>
                {{ $currency->label }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'currency_id'])
</div>
<div class="form-group @isset($fieldsErrors['language_id']) has-error @endisset">
    <label class="form-label" for="products-create-language_id">{{ __('validation.attributes.language_id') }}</label>
    <select id="products-create-language_id" class="form-select" name="language_id">
        <option value="" @selected((string)(array_key_exists('language_id', $old) ? $old['language_id'] : $item?->language_id) === (string)null)>
            Не выбрано
        </option>
        @foreach($languages as $language)
            <option
                value="{{ $language->getKey() }}" @selected((string)(array_key_exists('language_id', $old) ? $old['language_id'] : $item?->language_id) === (string)$language->getKey())>
                {{ $language->label }}
            </option>
        @endforeach
    </select>
    @include('Html::admin.components.forms.form-input-hint', ['fieldsErrors' => $fieldsErrors, 'field' => 'language_id'])
</div>
