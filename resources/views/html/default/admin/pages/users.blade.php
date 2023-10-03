<?php
/** @var \App\Models\User $user */
/** @var \Illuminate\Database\Eloquent\Collection $users */
/** @var array $frd */
/** @var array $seo */
$seo = $seo ?? [];
$frd = $frd ?? [];
$clearFrd = [];

$fieldsField = $fieldsField ?? 'fields';
$sortField = $sortField ?? 'sort';
$filterField = $filterField ?? 'filter';
$selectedField = $selectedField ?? 'selected';
$paramsFields = [$fieldsField, $sortField, $filterField, $selectedField];

foreach ($frd as $name => $value) if (!in_array($name, $paramsFields)) $clearFrd[$name] = $value;

$fields = [
    'id'                => [
        'operator' => '=', 'active' => true, 'type' => 'text', 'label' => 'ID', 'class' => 'table-column-id',
    ],
    'status'            => [
        'operator' => '=', 'active' => true, 'type' => 'select', 'label' => 'Статус', 'options' => ['' => 'Все', '1' => 'Активные']
    ],
    'name'              => [
        'operator' => '=', 'active' => true, 'type' => 'text', 'label' => 'Название',
    ],
    'email'             => [
        'operator' => '=', 'active' => true, 'type' => 'text', 'label' => 'Email',
    ],
    'email_verified_at' => [
        'operator' => '=', 'active' => true, 'type' => 'date', 'label' => 'Верификация',
    ],
    'currency_id'       => [
        'operator' => '=', 'active' => false, 'type' => 'select', 'label' => 'Валюта', 'options' => ['' => 'Все', '1' => 'Рубль']
    ],
    'language_id'       => [
        'operator' => '=', 'active' => false, 'type' => 'select', 'label' => 'Язык', 'options' => ['' => 'Все', '1' => 'Русский']
    ],
];

$fieldsArray = isset($frd[$fieldsField]) && is_array($frd[$fieldsField]) ? $frd[$fieldsField] : ['id', 'status', 'name', 'email'];
foreach ($fields as $name => &$field) {
    $field['active'] = in_array($name, $fieldsArray);
}

$selectedIndex = array_flip($frd[$selectedField] ?? []);
// notSelected, selected, allSelected
$selectedType = count($selectedIndex) === 0 ? 'notSelected' : 'allSelected';

$rows = [];
foreach ($users as $user) {
    $row = [
        'id' => $user->getKey(),
        '_link' => route('admin.users.edit', compact('user')),
        '_checked' => isset($selectedIndex[$user->getKey()]),
        '_label' => '#' . $user->getKey() . ' - ' . $user->email . ($user->name ? "($user->name)" : ''),
    ];

    if ($fields['status']['active']) {
        $row['status'] = __('user.status.' . $user->status);
    }
    if ($fields['name']['active']) {
        $row['name'] = $user->name;
    }
    if ($fields['email']['active']) {
        $row['email'] = $user->email;
    }
    if ($fields['email_verified_at']['active']) {
        $row['email_verified_at'] = $user->email_verified_at ?? 'Не верифицирован';
    }
    if ($fields['currency_id']['active']) {
        $row['currency_id'] = $user->currency?->label ?? '-';
    }
    if ($fields['language_id']['active']) {
        $row['language_id'] = $user->language?->label ?? '-';
    }
    $rows[] = $row;

    if (!isset($selectedIndex[$row['id']]) && $selectedType === 'allSelected') {
        $selectedType = 'selected';
    }
}
?>
@extends('Html::admin.layouts.app', compact('seo', 'frd'))

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Панель</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
    </ul>
    <form action="{{ route('admin.users.index', $clearFrd) }}" method="GET">
        <input type="hidden" name="{{ $sortField }}" value="{{ $frd[$sortField]??null }}">
        @if(count($clearFrd) > 0)
            <!-- Параметры других форм -->
            @foreach(explode('&', \Arr::query($clearFrd)) as $param)
                    <?php $param = explode('=', $param); ?>
                <input type="hidden" name="{{ $param[0]??null }}" value="{{ $param[1]??null }}">
            @endforeach
        @endif
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
                    @foreach($fields as $name=>$field)
                        @if($field['active'])
                            <th>
                                <a href="{{ route('admin.users.index', [...$frd, $sortField => $frd[$sortField] === $name?'-'.$name: $name]) }}"
                                   class="btn btn-link-white text-bold">
                                    {{ $field['label'] }}
                                    @if($frd[$sortField] === $name)
                                        <i class="icon icon-downward"></i>
                                    @endif
                                    @if($frd[$sortField] === '-'.$name)
                                        <i class="icon icon-upward"></i>
                                    @endif
                                </a>
                            </th>
                        @endif
                    @endforeach
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
                    @foreach($fields as $name=>$field)
                        @if($field['active'])
                            <th {!! isset($field['class']) ? 'class="'.$field['class'].'"' : '' !!} >
                                <input type="hidden" value="{{ $field['operator'] ?? '=' }}"
                                       name="{{ $filterField }}[{{ $name }}][operator]">
                                <label class="form-group d-block">
                                    @if(in_array($field['type'], ['text', 'date']))
                                        <input class="form-input" type="{{ $field['type'] }}"
                                               placeholder="{{ $field['label'] }}"
                                               name="{{ $filterField }}[{{ $name }}][value]"
                                               value="{{ $frd[$filterField][$name]['value'] ?? '' }}">
                                    @elseif($field['type'] === 'select')
                                        <select class="form-select" name="{{ $filterField }}[{{ $name }}][value]"
                                                value="{{ $frd[$filterField][$name]['value'] ?? '' }}">
                                            @foreach($field['options'] as $optionValue=>$optionLabel)
                                                <option
                                                    value="{{ $optionValue }}" @selected(($frd[$filterField][$name]['value'] ?? '') == $optionValue)>
                                                    {{ $optionLabel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </label>
                            </th>
                        @endif
                    @endforeach
                    <th class="text-right">
                        <button class="btn btn-action btn-link" type="submit"><i class="icon icon-search"></i></button>
                        <a href="{{ route('admin.users.index', $clearFrd) }}" class="btn btn-action btn-link ml-1"><i
                                class="icon icon-cross"></i></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            <div class="form-group">
                                @if($selectedType === 'notSelected')
                                    <label class="table-checkbox form-checkbox form-inline">
                                        <input type="checkbox" name="{{ $selectedField }}[]"
                                               value="{{ $row['id'] }}" @checked($row['_checked'])><i
                                            class="form-icon"></i>
                                    </label>
                                @elseif($selectedType === 'selected')
                                    <label class="table-checkbox form-checkbox form-inline">
                                        <input type="checkbox" name="{{ $selectedField }}[]"
                                               value="{{ $row['id'] }}" @checked($row['_checked'])><i
                                            class="form-icon"></i>
                                    </label>
                                @elseif($selectedType === 'allSelected')
                                    <label class="table-checkbox form-checkbox form-inline">
                                        <input type="checkbox" name="{{ $selectedField }}[]"
                                               value="{{ $row['id'] }}" @checked($row['_checked'])><i
                                            class="form-icon"></i>
                                    </label>
                                @endif
                            </div>
                        </td>
                        @foreach($fields as $name=>$field)
                            @if($field['active'])
                                <td><a href="{{ $row['_link'] }}" class="link-reset">{{ $row[$name]??'' }}</a></td>
                            @endif
                        @endforeach
                        <td>
                            <div class="text-right">
                                <button class="btn btn-action btn-link"><i class="icon icon-copy"></i></button>
                                <a href="#modal-delete-{{ $row['id'] }}"
                                   class="btn btn-action btn-link-error ml-1"><i class="icon icon-delete"></i></a>
                            </div>
                            <div class="modal modal-sm" id="modal-delete-{{ $row['id'] }}">
                                <a href="#close" class="modal-overlay" aria-label="Close"></a>
                                <div class="modal-container">
                                    <div class="modal-header">
                                        <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                                        <div class="modal-title h5">Подтвердите удаление</div>
                                    </div>
                                    <div class="modal-body">
                                        Подтверждаете удаление <br><b>{{ $row['_label'] }}</b>?
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
            {{ $users->appends($frd)->onEachSide(2)->links('Html::admin.components.pagination') }}
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

                    @foreach($fields as $name=>$field)
                        <div class="form-group">
                            <label class="form-checkbox">
                                <input type="checkbox" name="{{ $fieldsField }}[]"
                                       value="{{ $name }}" @checked($field['active'])>
                                <i class="form-icon"></i> {{ $field['label'] }}
                            </label>
                        </div>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary float-left" type="submit">Применить</button>
                    <a href="#" class="btn">Закрыть</a>
                </div>
            </div>
        </div>
    </form>
@endsection
