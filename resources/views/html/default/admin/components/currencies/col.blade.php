<?php
/** @var \App\Models\Currency $item */
/** @var string $name */
?>
<td>
    <a href="{{ route('admin.currencies.edit', compact('item')) }}" class="link-reset">
        @switch($name)
            @case('id'){{ $item->getKey() }}@break
            @case('status'){{ __('currencies.status.' . $item->status) }}@break
            @case('name'){{ $item->label }}@break
            @case('email'){{ $item->code }}@break
            @case('exchange_rate'){{ $item->exchange_rate }}@break
        @endswitch
    </a>
</td>
