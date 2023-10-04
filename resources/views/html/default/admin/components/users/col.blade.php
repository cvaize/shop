<?php
/** @var \App\Models\User $item */
/** @var string $name */
?>
<td>
    <a href="{{ route('admin.users.edit', compact('item')) }}" class="link-reset">
        @switch($name)
            @case('id'){{ $item->getKey() }}@break
            @case('status'){{ __('user.status.' . $item->status) }}@break
            @case('name'){{ $item->name }}@break
            @case('email'){{ $item->email }}@break
            @case('email_verified_at'){{ $item->email_verified_at ?? 'Не верифицирован' }}@break
            @case('currency_id'){{ $item->currency?->label ?? '-' }}@break
            @case('language_id'){{ $item->language?->label ?? '-' }}@break
        @endswitch
    </a>
</td>
