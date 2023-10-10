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
            ...array_map(fn($statusId) => __('languages.status.' . $statusId), \App\Enums\LanguageStatus::values())
        ]
    ],
    'label'         => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Название',
    ],
    'code'          => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Код',
    ],
    'created_at'    => [
        'active' => false, 'label' => 'Дата создания',
    ],
    'updated_at'    => [
        'active' => false, 'label' => 'Дата обновления',
    ],
];
$selectedActionsTemplate = 'Html::admin.components.pages.languages.selected-actions';
$colTemplate = 'Html::admin.components.pages.languages.col';
$colActionsTemplate = 'Html::admin.components.pages.languages.col-actions';
$actionsTemplate = 'Html::admin.components.pages.languages.actions';
$indexUrl = route('admin.languages.index');
$selectedDestroyAction = route('admin.languages.selectedDestroy');
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
            <a href="{{ $indexUrl }}">Языки</a>
        </li>
    </ul>
@endsection
