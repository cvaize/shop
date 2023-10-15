<?php
/** @var \App\Models\Currency $item */
?>
<div class="text-right">
    <a href="{{ route('admin.products.copy', $item) }}" class="btn btn-action btn-link"><i
            class="icon icon-copy"></i></a>
    @include('Html::admin.components.layouts.list.link-delete', [ 'key' => $item->getKey() ])
</div>

@include('Html::admin.components.layouts.list.modal-delete', [
    'key' => $item->getKey(),
    'label' => '#' . $item->getKey() . ' - ' . $item->email,
    'action' => route('admin.products.destroy', compact('item'))
])
