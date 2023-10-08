<?php
/** @var \Illuminate\Database\Eloquent\Model $item */
/** @var \Illuminate\Database\Eloquent\Collection $items */
/** @var array $frd */
/** @var array $seo */
/** @var array $fields */
/** @var string $selectedActionsTemplate */
/** @var string $colTemplate */
/** @var string $colActionsTemplate */
/** @var string $actionsTemplate */
/** @var string $indexUrl */
/** @var string $selectedDestroyAction */
/** @var bool $isSelect */

if (!isset($colTemplate)) throw new Error('HTML_ADMIN_LAYOUT_LIST_COL_TEMPLATE_NOT_FOUND');
if (!isset($indexUrl)) throw new Error('HTML_ADMIN_LAYOUT_LIST_INDEX_URL_NOT_FOUND');
if (!isset($items)) throw new Error('HTML_ADMIN_LAYOUT_LIST_ITEMS_NOT_FOUND');
if (!isset($fields)) throw new Error('HTML_ADMIN_LAYOUT_LIST_ITEMS_NOT_FOUND');

$selectedActionsTemplate = $selectedActionsTemplate ?? 'Html::admin.components.layouts.list.selected-actions';
$isSelect = $isSelect ?? isset($selectedDestroyAction);

$seo = $seo ?? [];
$frd = $frd ?? [];
$clearFrd = [];

$pageField = $pageField ?? 'page';
$fieldsField = $fieldsField ?? 'fields';
$sortField = $sortField ?? 'sort';
$filterField = $filterField ?? 'filter';
$selectedField = $selectedField ?? 'selected';
$selectedAllField = $selectedAllField ?? 'selected_all_page';
$tokenField = $tokenField ?? '_token';
$paramsFields = [$fieldsField, $sortField, $filterField, $selectedField, $pageField, $tokenField, $selectedAllField];

foreach ($frd as $name => $value) if (!in_array($name, $paramsFields)) $clearFrd[$name] = $value;

if (isset($frd[$fieldsField]) && is_array($frd[$fieldsField])) {
    $fieldsArray = $frd[$fieldsField];
} else {
    $fieldsArray = [];
    foreach ($fields as $name => $field) {
        if ($field['active']) $fieldsArray[] = $name;
    }
}
foreach ($fields as $name => $field) {
    $fields[$name]['active'] = in_array($name, $fieldsArray);
}

$clearUrl = $indexUrl . (count($clearFrd) > 0 ? '?' . http_build_query($clearFrd) : '');

$frdForPagination = [...$frd];
unset($frdForPagination[$tokenField]);
unset($frdForPagination[$selectedField]);

if ($isSelect) {
    $selectedIndex = array_flip(Session::get($selectedField)?->toArray() ?? []);;
}
?>
@extends('Html::admin.layouts.app', compact('seo', 'frd'))

@section('content')
    <form id="form-list-index" action="{{ $indexUrl }}" method="GET">
        <button type="submit" style="display: none">FixSubmitInputForm</button>
        <input type="hidden" name="{{ $sortField }}" value="{{ $frd[$sortField]??null }}">
        @if(count($clearFrd) > 0)
            <!-- Параметры других форм -->
            @foreach(explode('&', \Arr::query($clearFrd)) as $param)
                    <?php $param = explode('=', $param); ?>
                <input type="hidden" name="{{ $param[0]??null }}" value="{{ $param[1]??null }}">
            @endforeach
        @endif
        <input type="hidden" name="page" value="1">
    </form>
    <form id="form-list-selected-actions" action="{{ $indexUrl }}" method="POST">
        @csrf
        <button type="submit" style="display: none">FixSubmitInputForm</button>
    </form>

    <div style="display: block;overflow-x: auto;padding-bottom: 0.75rem;">
        <table class="table table-striped table-hover">
            <thead class="bg-primary">
            <tr>
                @if($isSelect)
                    <th class="table-column-checkbox">
                        @include($selectedActionsTemplate, compact('selectedDestroyAction'))
                    </th>
                @endif
                @foreach($fields as $name=>$field)
                    @if($field['active'])
                        <th>
                            <button type="submit"
                                    form="form-list-index"
                                    name="sort" value="{{ ($frd[$sortField] === $name?'-'.$name: $name) }}"
                                    class="btn btn-link-white text-bold">
                                {{ $field['label'] }}
                                @if($frd[$sortField] === $name)
                                    <i class="icon icon-downward"></i>
                                @endif
                                @if($frd[$sortField] === '-'.$name)
                                    <i class="icon icon-upward"></i>
                                @endif
                            </button>
                        </th>
                    @endif
                @endforeach
                <th class="text-right">
                    @isset($actionsTemplate)
                        @include($actionsTemplate)
                    @endisset
                    <a href="#modal-list-show-columns" class="btn btn-action btn-link-white ml-1"><i
                            class="icon icon-apps"></i></a>
                </th>
            </tr>
            </thead>
            <thead>
            <tr>
                @if($isSelect)
                    <th class="table-column-checkbox">
                        <button class="btn btn-action btn-link" form="form-list-index" type="submit"
                                name="{{ $selectedAllField }}" value="{{ $frd[$pageField] ?? 1 }}" title="Выбрать все">
                            <i class="icon icon-check"></i>
                        </button>
                    </th>
                @endif
                @foreach($fields as $name=>$field)
                    @if($field['active'])
                        <th class="table-column-{{ $name }}">
                            @isset($field['type'])
                                <input form="form-list-index" type="hidden" value="{{ $field['operator'] ?? '==' }}"
                                       name="{{ $filterField }}[{{ $name }}][operator]">
                                <label class="form-group d-block">
                                    @if(in_array($field['type'], ['text', 'date']))
                                        <input class="form-input" type="{{ $field['type'] }}"
                                               form="form-list-index"
                                               placeholder="{{ $field['label'] }}"
                                               name="{{ $filterField }}[{{ $name }}][value]"
                                               value="{{ $frd[$filterField][$name]['value'] ?? '' }}">
                                    @elseif($field['type'] === 'select')
                                        <select class="form-select" form="form-list-index"
                                                name="{{ $filterField }}[{{ $name }}][value]"
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
                            @endif
                        </th>
                    @endif
                @endforeach
                <th class="text-right">
                    <button class="btn btn-action btn-link" form="form-list-index" type="submit"><i
                            class="icon icon-search"></i></button>
                    <a href="{{ $clearUrl }}" class="btn btn-action btn-link ml-1"><i
                            class="icon icon-cross"></i></a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    @if($isSelect)
                        <td class="table-column-checkbox">
                            <div class="form-group" style="padding-left: 6px;">
                                <label class="table-checkbox form-checkbox form-inline">
                                    <input type="checkbox" form="form-list-selected-actions"
                                           name="{{ $selectedField }}[]"
                                           value="{{ $item->getKey() }}" @checked(isset($selectedIndex[$item->getKey()]))><i
                                        class="form-icon"></i>
                                </label>
                            </div>
                        </td>
                    @endif
                    @foreach($fields as $name=>$field)
                        @if($field['active'])
                            @include($colTemplate, compact('item', 'name', 'field'))
                        @endif
                    @endforeach
                    <td>
                        @isset($colActionsTemplate)
                            @include($colActionsTemplate, compact('item'))
                        @endisset
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex-centered">
        {{ $items->appends($frdForPagination)->onEachSide(2)->links('Html::admin.components.pagination') }}
    </div>

    <div class="modal modal-sm" id="modal-list-show-columns">
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
                            <input type="checkbox" name="{{ $fieldsField }}[]" form="form-list-index"
                                   value="{{ $name }}" @checked($field['active'])>
                            <i class="form-icon"></i> {{ $field['label'] }}
                        </label>
                    </div>
                @endforeach

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-left" type="submit" form="form-list-index">Применить</button>
                <a href="#close" class="btn">Закрыть</a>
            </div>
        </div>
    </div>
    @hasSection('after-list')
        @yield('after-list')
    @endif
@endsection
