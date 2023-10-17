<?php
/** @var \Illuminate\Database\Eloquent\Collection $items */
/** @var \Illuminate\Database\Eloquent\Collection $currencies */
/** @var array $frd */
/** @var array $seo */
$seo = $seo ?? [];
$frd = $frd ?? [];

$fields = [
    'id'                => [
        'operator' => '==', 'active' => true, 'type' => 'text', 'label' => 'ID',
    ],
    'status'            => [
        'operator' => '==', 'active' => true, 'type' => 'select', 'label' => 'Статус', 'options' => [
            '' => 'Все',
            ...array_map(fn($statusId) => __('status.' . $statusId), \App\Enums\CommonStatus::values())
        ]
    ],
    'type_id'       => [
        'operator' => '==', 'active' => true, 'type' => 'select', 'label' => 'Тип', 'options' => [
            '' => 'Все',
            ...array_map(fn($typeId) => __('product.type_id.' . $typeId), \App\Enums\ProductType::values())
        ]
    ],
    'code'              => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Код',
    ],
    'slug'             => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Slug',
    ],
    'created_at' => [
        'active' => false, 'label' => 'Дата создания',
    ],
    'updated_at' => [
        'active' => false, 'label' => 'Дата обновления',
    ],
];
$selectedActionsTemplate = 'Html::admin.components.pages.products.selected-actions';
$colTemplate = 'Html::admin.components.pages.products.col';
$colActionsTemplate = 'Html::admin.components.pages.products.col-actions';
$actionsTemplate = 'Html::admin.components.pages.products.actions';
$indexUrl = route('admin.products.index');
$selectedDestroyAction = route('admin.products.selectedDestroy');
$isSelect = true;

$layoutData = compact('seo', 'frd', 'fields', 'items', 'isSelect', 'indexUrl', 'selectedActionsTemplate', 'colTemplate',
    'colActionsTemplate', 'actionsTemplate', 'selectedDestroyAction');
?>
@extends('Html::admin.layouts.list', $layoutData)

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ $indexUrl }}">Товары</a>
        </li>
    </ul>
@endsection
