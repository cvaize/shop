<?php
/** @var \App\Models\Product $item */
/** @var string $name */
?>
<td>
    <a href="{{ route('admin.products.edit', $item) }}" class="link-reset">
        @switch($name)
            @case('id'){{ $item->getKey() }}@break
            @case('status'){{ __('status.' . $item->status) }}@break
            @case('type_id'){{ $item->type?->label }}@break
            @case('code'){{ $item->code }}@break
            @case('slug'){{ $item->slug }}@break
            @case('created_at'){{ $item->created_at?->format('d/m/Y H:i:s') }}@break
            @case('updated_at'){{ $item->updated_at?->format('d/m/Y H:i:s') }}@break
        @endswitch
    </a>
</td>
