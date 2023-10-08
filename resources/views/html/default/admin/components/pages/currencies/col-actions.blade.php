<?php
/** @var \App\Models\Currency $item */
?>
<div class="text-right">
    @include('Html::admin.components.layouts.list.link-copy', [ 'key' => $item->getKey() ])
    @include('Html::admin.components.layouts.list.link-delete', [ 'key' => $item->getKey() ])
</div>

@include('Html::admin.components.layouts.list.modal-delete', [
    'key' => $item->getKey(),
    'label' => '#' . $item->getKey() . ' - ' . $item->label,
    'action' => route('admin.currencies.destroy', compact('item'))
])
{{--Ссылки на редактирование в колонках--}}

@include('Html::admin.components.layouts.list.modal-edit', [
    'key' => $item->getKey(),
    'action' => route('admin.currencies.update', compact('item')),
    'form' => 'Html::admin.components.pages.currencies.form',
    'formParams' => compact('item'),
])

@include('Html::admin.components.layouts.list.modal-copy', [
    'key' => $item->getKey(),
    'action' => route('admin.currencies.store'),
    'form' => 'Html::admin.components.pages.currencies.form',
    'formParams' => compact('item'),
])
