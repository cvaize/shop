<?php
/** @var \Illuminate\Database\Eloquent\Collection $items */
/** @var array $frd */
/** @var array $seo */
$seo = $seo ?? [];
$frd = $frd ?? [];

$fields = [
    'id'                => [
        'operator' => '==', 'active' => true, 'type' => 'text', 'label' => 'ID',
    ],
    'status'            => [
        'operator' => '==', 'active' => true, 'type' => 'select', 'label' => 'Статус', 'options' => ['' => 'Все', ...\App\Models\User::getStatusesNames()]
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
        'operator' => '==', 'active' => false, 'type' => 'select', 'label' => 'Валюта', 'options' => ['' => 'Все', '1' => 'Рубль']
    ],
    'language_id'       => [
        'operator' => '==', 'active' => false, 'type' => 'select', 'label' => 'Язык', 'options' => ['' => 'Все', '1' => 'Русский']
    ],
];
$selectedActionsTemplate = 'Html::admin.components.users.selected-actions';
$colTemplate = 'Html::admin.components.users.col';
$colActionsTemplate = 'Html::admin.components.users.col-actions';
$actionsTemplate = 'Html::admin.components.users.actions';
$indexUrl = route('admin.users.index');
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
            <a href="{{ $indexUrl }}">Пользователи</a>
        </li>
    </ul>
@endsection
