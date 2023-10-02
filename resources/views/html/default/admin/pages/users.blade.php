<?php
/** @var \App\Models\User $user */
?>
@extends('Html::admin.layouts.app', ['seo' => $seo ?? null])

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
    </ul>
    <div style="display: block;overflow-x: auto;padding-bottom: 0.75rem;">
        <table class="table table-striped table-hover table-column-small">
            <thead class="bg-primary">
            <tr>
                <th>
                    <div class="dropdown" style="margin: -0.3rem -0.2rem;">
                        <button class="btn btn-action btn-link-white dropdown-toggle" tabindex="0">
                            <i class="icon icon-more-vert"></i>
                        </button>
                        <!-- menu component -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#" class="text-error" style="white-space: nowrap">
                                    Удалить выбранное
                                </a>
                            </li>
                        </ul>
                    </div>
                </th>
                <th>
                    <button class="btn btn-link-white">
                        ID
                        <i class="icon icon-downward"></i>
                    </button>
                </th>
                <th>
                    <button class="btn btn-link-white">
                        Статус
                        <i class="icon icon-upward"></i>
                    </button>
                </th>
                <th>Название</th>
                <th>Email</th>
                <th>Верификация</th>
                <th>Валюта</th>
                <th>Язык</th>
                <th class="text-right">
                    <button class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></button>
                    <button class="btn btn-action btn-link-white ml-1"><i class="icon icon-apps"></i></button>
                </th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th>
                    <div class="form-group">
                        <label class="table-checkbox form-checkbox form-inline">
                            <input type="checkbox" checked=""><i class="form-icon"></i>
                        </label>
                    </div>
                </th>
                <th style="max-width: 100px;">
                    <label class="form-group d-block">
                        <input class="form-input" type="text" placeholder="ID">
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <select class="form-select">
                            <option>Все</option>
                        </select>
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <input class="form-input" type="text" placeholder="Название">
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <input class="form-input" type="email" placeholder="Email">
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <input class="form-input" type="date" placeholder="Верификация">
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <select class="form-select">
                            <option>Валюта</option>
                        </select>
                    </label>
                </th>
                <th>
                    <label class="form-group d-block">
                        <select class="form-select">
                            <option>Язык</option>
                        </select>
                    </label>
                </th>
                <th class="text-right">
                    <button class="btn btn-action btn-link"><i class="icon icon-search"></i></button>
                    <button class="btn btn-action btn-link ml-1"><i class="icon icon-cross"></i></button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <?php $editUrl = route('admin.users.edit', compact('user')); ?>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="table-checkbox form-checkbox form-inline">
                                <input type="checkbox" name="table[selected][]" value="{{ $user->getKey() }}"><i
                                    class="form-icon"></i>
                            </label>
                        </div>
                    </td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->getKey() }}</a></td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ __('user.status.' . $user->status) }}</a></td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->name }}</a></td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->email }}</a></td>
                    <td><a href="{{ $editUrl }}"
                           class="link-reset">{{ $user->email_verified_at ?? 'Не верифицирован' }}</a></td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->currency?->label ?? '-' }}</a></td>
                    <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->language?->label ?? '-' }}</a></td>
                    <td class="text-right">
                        <button class="btn btn-action btn-link"><i class="icon icon-copy"></i></button>
                        <button class="btn btn-action btn-link-error ml-1"><i class="icon icon-delete"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
