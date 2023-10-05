<?php
/** @var \App\Models\Currency $item */
$item = $item ?? null;
?>
<div class="form-group @error('status') has-error @enderror">
    <label class="form-label" for="currencies-create-status">Статус</label>
    <select id="currencies-create-status" class="form-select" name="status">
        @foreach(\App\Enums\CurrencyStatus::values() as $statusId)
            <option value="{{ $statusId }}" @selected((string)(old('status') ?? $item?->status) === (string)$statusId)>
                {{ __('currencies.status.' . $statusId) }}
            </option>
        @endforeach
    </select>
    @error('status')
    <div class="form-input-hint">{{ $message }}</div>
    @enderror
</div>
<div class="form-group @error('label') has-error @enderror">
    <label class="form-label" for="currencies-create-label">Название</label>
    <input name="label" class="form-input" type="text" id="currencies-create-label"
           placeholder="Название" value="{{ old('label') ?? $item?->label }}">
    @error('label')
    <div class="form-input-hint">{{ $message }}</div>
    @enderror
</div>
<div class="form-group @error('code') has-error @enderror">
    <label class="form-label" for="currencies-create-code">Код</label>
    <input name="code" class="form-input" type="text" id="currencies-create-code"
           placeholder="Код" value="{{ old('code') ?? $item?->code }}">
    @error('code')
    <div class="form-input-hint">{{ $message }}</div>
    @enderror
</div>
<div class="form-group @error('exchange_rate') has-error @enderror">
    <label class="form-label" for="currencies-create-exchange_rate">Обменный курс</label>
    <input name="exchange_rate" class="form-input" type="number"
           id="currencies-create-exchange_rate"
           placeholder="Код" value="{{ old('exchange_rate') ?? $item?->exchange_rate }}">
    @error('exchange_rate')
    <div class="form-input-hint">{{ $message }}</div>
    @enderror
</div>
