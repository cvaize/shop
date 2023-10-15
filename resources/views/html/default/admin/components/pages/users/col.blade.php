<?php
/** @var \App\Models\User $item */
/** @var string $name */
?>
<td>
    <a href="{{ route('admin.users.edit', $item) }}" class="link-reset">
        @switch($name)
            @case('id'){{ $item->getKey() }}@break
            @case('status'){{ __('status.' . $item->status) }}@break
            @case('name'){{ $item->name }}@break
            @case('email'){{ $item->email }}@break
            @case('email_verified_at'){{ $item->email_verified_at?->format('d/m/Y H:i:s') }}@break
            @case('currency_id'){{ $item->currency?->label }}@break
            @case('language_id'){{ $item->language?->label }}@break
            @case('created_at'){{ $item->created_at?->format('d/m/Y H:i:s') }}@break
            @case('updated_at'){{ $item->updated_at?->format('d/m/Y H:i:s') }}@break
        @endswitch
    </a>
</td>
