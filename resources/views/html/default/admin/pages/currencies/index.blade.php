<?php
/** @var \Illuminate\Database\Eloquent\Collection $items */
/** @var array $frd */
/** @var array $seo */
$seo = $seo ?? [];
$frd = $frd ?? [];

$fields = [
    'id'            => [
        'operator' => '==', 'active' => true, 'type' => 'text', 'label' => 'ID',
    ],
    'status'        => [
        'operator' => '==', 'active' => true, 'type' => 'select', 'label' => 'Статус', 'options' => [
            '' => 'Все',
            ...array_map(fn($statusId) => __('currencies.status.' . $statusId), \App\Enums\CurrencyStatus::values())
        ]
    ],
    'label'         => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Название',
    ],
    'code'          => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Код',
    ],
    'exchange_rate' => [
        'active' => true, 'label' => 'Обменный курс',
    ]
];
$selectedActionsTemplate = 'Html::admin.components.pages.currencies.selected-actions';
$colTemplate = 'Html::admin.components.pages.currencies.col';
$colActionsTemplate = 'Html::admin.components.pages.currencies.col-actions';
$actionsTemplate = 'Html::admin.components.pages.currencies.actions';
$indexUrl = route('admin.currencies.index');
$isSelect = true;

$layoutData = compact('seo', 'frd', 'fields', 'items', 'isSelect', 'indexUrl', 'selectedActionsTemplate', 'colTemplate', 'colActionsTemplate', 'actionsTemplate');
?>
@extends('Html::admin.layouts.list', $layoutData)

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ $indexUrl }}">Валюты</a>
        </li>
    </ul>
@endsection
