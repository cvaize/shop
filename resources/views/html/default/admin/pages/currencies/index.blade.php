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
$selectedActionsTemplate = 'Html::admin.components.currencies.selected-actions';
$colTemplate = 'Html::admin.components.currencies.col';
$colActionsTemplate = 'Html::admin.components.currencies.col-actions';
$actionsTemplate = 'Html::admin.components.currencies.actions';
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

@section('after-list')
    <form action="{{ route('admin.currencies.store') }}" method="post">
        @csrf
        <input type="hidden" name="anchor" value="modal-currencies-create">
        <div class="modal modal-sm" id="modal-currencies-create">
            <a href="#close" class="modal-overlay" aria-label="Close"></a>
            <div class="modal-container">
                <div class="modal-header">
                    <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                    <div class="modal-title h5">Создание валюты</div>
                </div>
                <div class="modal-body">
                    @include('Html::admin.components.currencies.form')
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success float-left" type="submit">
                        Создать
                    </button>
                    <a href="#close" class="btn">Закрыть</a>
                </div>
            </div>
        </div>
    </form>
@endsection
