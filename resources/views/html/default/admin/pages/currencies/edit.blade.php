<?php
/** @var \App\Models\Currency $item */
?>
@extends('Html::admin.layouts.app', compact('seo'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.currencies.index') }}">Валюты</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.currencies.edit', $item) }}">{{ $item->label }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <form action="{{ route('admin.currencies.update', $item) }}" method="post">
        @csrf
        <input type="hidden" name="back" value="edit">
        @include('Html::admin.components.currencies.form', compact('item'))
        <button class="btn btn-success" type="submit">
            Обновить
        </button>
    </form>
@endsection
