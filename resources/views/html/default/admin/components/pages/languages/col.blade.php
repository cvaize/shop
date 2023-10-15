<?php
/** @var \App\Models\Currency $item */
/** @var string $name */
?>
<td>
    <a href="#modal-list-{{ $item->getKey() }}-edit" class="link-reset">
        @switch($name)
            @case('id'){{ $item->getKey() }}@break
            @case('status'){{ __('status.' . $item->status) }}@break
            @case('label'){{ $item->label }}@break
            @case('code'){{ $item->code }}@break
            @case('created_at'){{ $item->created_at?->format('d/m/Y H:i:s') }}@break
            @case('updated_at'){{ $item->updated_at?->format('d/m/Y H:i:s') }}@break
        @endswitch
    </a>
</td>
