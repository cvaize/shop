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
            <a href="{{ route('admin.users.create') }}">Создание</a>
        </li>
    </ul>
@endsection

@section('content')
    <div style="max-width: 400px; margin: 0 auto;">
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            @include('Html::admin.components.pages.users.form')
            <br>
            <div class="flex-centered">
                <button class="btn btn-success" type="submit">
                    Создать
                </button>
            </div>
        </form>
    </div>
@endsection
