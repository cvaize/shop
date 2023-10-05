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
            <a href="{{ route('admin.currencies.create') }}">Создание</a>
        </li>
    </ul>
@endsection

@section('content')
    <form action="{{ route('admin.currencies.store') }}" method="post">
        @csrf
        <input type="hidden" name="back" value="create">
        @include('Html::admin.components.currencies.form')
        <button class="btn btn-success" type="submit">
            Создать
        </button>
    </form>
@endsection
