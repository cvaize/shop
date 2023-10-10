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
            <a href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users.edit', $item) }}">Редактирование пользователя "{{ $item->email }}"</a>
        </li>
    </ul>
@endsection

@section('content')
    <div style="max-width: 400px; margin: 0 auto;">
        <form action="{{ route('admin.users.update', $item) }}" method="post">
            @csrf
            @include('Html::admin.components.pages.users.form', compact('item'))
            <br>
            <div class="flex-centered">
                <button class="btn btn-success" type="submit">
                    Обновить
                </button>
            </div>
        </form>
    </div>
@endsection
