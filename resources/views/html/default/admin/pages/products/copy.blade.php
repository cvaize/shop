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
            <a href="{{ route('admin.products.index') }}">Товары</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.products.copy', $item) }}">Копирование товара "{{ $item->code }}"</a>
        </li>
    </ul>
@endsection

@section('content')
    <div style="max-width: 400px; margin: 0 auto;">
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            @include('Html::admin.components.pages.products.form', compact('item'))
            <br>
            <div class="flex-centered">
                <button class="btn btn-success" type="submit">
                    Скопировать
                </button>
            </div>
        </form>
    </div>
@endsection
