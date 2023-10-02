<?php
/** @var \App\Models\User $user */
/** @var array $frd */
/** @var array $seo */
$seo = $seo ?? null;
$sort = $sort ?? null;
$sortField = $sortField ?? 'sort';
$filterField = $filterField ?? 'filter';
?>
@extends('Html::admin.layouts.app', compact('seo'))

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
    </ul>
    <form action="{{ route('admin.users.index') }}" method="GET">
        <input type="hidden" name="{{ $sortField }}" value="{{ $frd[$sortField]??null }}">
        <div style="display: block;overflow-x: auto;padding-bottom: 0.75rem;">
            <table class="table table-striped table-hover table-column-small">
                <thead class="bg-primary">
                <tr>
                    <th>
                        <div class="dropdown" style="margin: -0.3rem -0.2rem;">
                            <button class="btn btn-action btn-link-white dropdown-toggle" tabindex="0" type="button">
                                <i class="icon icon-more-vert"></i>
                            </button>
                            <!-- menu component -->
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#modal-delete-selected" class="text-error" style="white-space: nowrap">
                                        Удалить выбранное
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </th>
                    <th>
                        <button class="btn btn-link-white text-bold" name="{{ $sortField }}"
                                value="{{ $sort === 'id'?'-id': 'id' }}">
                            ID
                            @if($sort === 'id')
                                <i class="icon icon-downward"></i>
                            @endif
                            @if($sort === '-id')
                                <i class="icon icon-upward"></i>
                            @endif
                        </button>
                    </th>
                    <th>
                        Статус
                    </th>
                    <th>
                        Название
                    </th>
                    <th>Email</th>
                    <th>Верификация</th>
                    <th>Валюта</th>
                    <th>Язык</th>
                    <th class="text-right">
                        <button class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></button>
                        <a href="#modal-show-columns" class="btn btn-action btn-link-white ml-1"><i
                                class="icon icon-apps"></i></a>
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
                        <input type="hidden" value="=" name="{{ $filterField }}[id][operator]">
                        <label class="form-group d-block">
                            <input class="form-input" type="text" placeholder="ID"
                                   name="{{ $filterField }}[id][value]"
                                   value="{{ $frd[$filterField]['id']['value'] ?? '' }}">
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
                        <button class="btn btn-action btn-link" type="submit"><i class="icon icon-search"></i></button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-action btn-link ml-1"><i
                                class="icon icon-cross"></i></a>
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
                        <td><a href="{{ $editUrl }}" class="link-reset">{{ __('user.status.' . $user->status) }}</a>
                        </td>
                        <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->name }}</a></td>
                        <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->email }}</a></td>
                        <td><a href="{{ $editUrl }}"
                               class="link-reset">{{ $user->email_verified_at ?? 'Не верифицирован' }}</a></td>
                        <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->currency?->label ?? '-' }}</a></td>
                        <td><a href="{{ $editUrl }}" class="link-reset">{{ $user->language?->label ?? '-' }}</a></td>
                        <td>
                            <div class="text-right">
                                <button class="btn btn-action btn-link"><i class="icon icon-copy"></i></button>
                                <a href="#modal-delete-{{ $user->getKey() }}"
                                   class="btn btn-action btn-link-error ml-1"><i class="icon icon-delete"></i></a>
                            </div>
                            <div class="modal modal-sm" id="modal-delete-{{ $user->getKey() }}">
                                <a href="#close" class="modal-overlay" aria-label="Close"></a>
                                <div class="modal-container">
                                    <div class="modal-header">
                                        <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                                        <div class="modal-title h5">Подтвердите удаление</div>
                                    </div>
                                    <div class="modal-body">
                                        Подтверждаете удаление <br><b>#{{ $user->getKey() }} - {{ $user->email }}</b>
                                        ({{ $user->name }})?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-error float-left">Удалить</button>
                                        <a href="#" class="btn">Закрыть</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex-centered">
            {{ $users->onEachSide(2)->links('Html::admin.components.pagination') }}
        </div>

        <div class="modal modal-sm" id="modal-delete-selected">
            <a href="#close" class="modal-overlay" aria-label="Close"></a>
            <div class="modal-container">
                <div class="modal-header">
                    <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                    <div class="modal-title h5">Подтвердите удаление</div>
                </div>
                <div class="modal-body">
                    Подтверждаете удаление одного или нескольких элементов?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-error float-left">Удалить</button>
                    <a href="#" class="btn">Закрыть</a>
                </div>
            </div>
        </div>

        <div class="modal modal-sm" id="modal-show-columns">
            <a href="#close" class="modal-overlay" aria-label="Close"></a>
            <div class="modal-container">
                <div class="modal-header">
                    <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                    <div class="modal-title h5">Колонки</div>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> ID
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Статус
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Название
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Email
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Верификация
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Валюта
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox">
                            <i class="form-icon"></i> Язык
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary float-left">Применить</button>
                    <a href="#" class="btn">Закрыть</a>
                </div>
            </div>
        </div>
    </form>
@endsection
