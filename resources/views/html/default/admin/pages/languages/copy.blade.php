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
            <a href="{{ route('admin.languages.index') }}">Языки</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.languages.copy', $item) }}">Копирование языка "{{ $item->label }}"</a>
        </li>
    </ul>
@endsection

@section('content')
    <div style="max-width: 400px; margin: 0 auto;">
        <form action="{{ route('admin.languages.store') }}" method="post">
            @csrf
            @include('Html::admin.components.pages.languages.form', compact('item'))
            <br>
            <div class="flex-centered">
                <button class="btn btn-success" type="submit">
                    Скопировать
                </button>
            </div>
        </form>
    </div>
@endsection
