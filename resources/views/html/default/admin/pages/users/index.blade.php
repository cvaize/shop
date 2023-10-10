<?php
/** @var \Illuminate\Database\Eloquent\Collection $items */
/** @var \Illuminate\Database\Eloquent\Collection $currencies */
/** @var \Illuminate\Database\Eloquent\Collection $languages */
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
            ...array_map(fn($statusId) => __('users.status.' . $statusId), \App\Enums\UserStatus::values())
        ]
    ],
    'name'              => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Название',
    ],
    'email'             => [
        'operator' => '~=', 'active' => true, 'type' => 'text', 'label' => 'Email',
    ],
    'email_verified_at' => [
        'operator' => '==', 'active' => true, 'type' => 'date', 'label' => 'Верификация',
    ],
    'currency_id'       => [
        'operator' => '==', 'active' => false, 'type' => 'select', 'label' => 'Валюта', 'options' => [
            '' => 'Все',
            ...$currencies->pluck('label', 'id')->toArray()
        ]
    ],
    'language_id'       => [
        'operator' => '==', 'active' => false, 'type' => 'select', 'label' => 'Язык', 'options' => [
            '' => 'Все',
            ...$languages->pluck('label', 'id')->toArray()
        ]
    ],
    'created_at' => [
        'active' => false, 'label' => 'Дата создания',
    ],
    'updated_at' => [
        'active' => false, 'label' => 'Дата обновления',
    ],
];
$selectedActionsTemplate = 'Html::admin.components.pages.users.selected-actions';
$colTemplate = 'Html::admin.components.pages.users.col';
$colActionsTemplate = 'Html::admin.components.pages.users.col-actions';
$actionsTemplate = 'Html::admin.components.pages.users.actions';
$indexUrl = route('admin.users.index');
$selectedDestroyAction = route('admin.users.selectedDestroy');
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
            <a href="{{ $indexUrl }}">Пользователи</a>
        </li>
    </ul>
@endsection
