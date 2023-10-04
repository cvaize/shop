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
/** @var bool $isSelect */

if (!isset($colTemplate)) throw new Error('HTML_ADMIN_LAYOUT_LIST_COL_TEMPLATE_NOT_FOUND');
if (!isset($indexUrl)) throw new Error('HTML_ADMIN_LAYOUT_LIST_INDEX_URL_NOT_FOUND');
if (!isset($items)) throw new Error('HTML_ADMIN_LAYOUT_LIST_ITEMS_NOT_FOUND');
if (!isset($fields)) throw new Error('HTML_ADMIN_LAYOUT_LIST_ITEMS_NOT_FOUND');

$isSelect = $isSelect ?? false;

$seo = $seo ?? [];
$frd = $frd ?? [];
$clearFrd = [];

$pageField = $pageField ?? 'page';
$fieldsField = $fieldsField ?? 'fields';
$sortField = $sortField ?? 'sort';
$filterField = $filterField ?? 'filter';
$selectedField = $selectedField ?? 'selected';
$tokenField = $tokenField ?? '_token';
$paramsFields = [$fieldsField, $sortField, $filterField, $selectedField, $pageField, $tokenField];

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

$selectedIndex = array_flip($frd[$selectedField] ?? []);
// notSelected, selected, allSelected
$selectedType = count($selectedIndex) === 0 ? 'notSelected' : 'allSelected';

$clearUrl = $indexUrl . (count($clearFrd) > 0 ? '?' . http_build_query($clearFrd) : '');

$frdForPagination = [...$frd];
unset($frdForPagination[$tokenField]);
unset($frdForPagination[$selectedField]);

$frdForSelected = [...$frd];
unset($frdForSelected[$selectedField]);
$symbolForSelected = count($frdForSelected) > 0 ? '&' : '?';
$urlForSelectedEmpty = $indexUrl . (count($frdForSelected) > 0 ? '?' . http_build_query($frdForSelected) : '');
$urlForSelectedAll = $urlForSelectedEmpty;

foreach ($items as $key => $item) {
    $id = $item->getKey();
    if ($key === 0) {
        $urlForSelectedAll .= $symbolForSelected . $selectedField . '[]=' . $id;
    } else {
        $urlForSelectedAll .= '&' . $selectedField . '[]=' . $id;
    }

    if (!isset($selectedIndex[$id]) && $selectedType === 'allSelected') {
        $selectedType = 'selected';
    }
}
?>
@extends('Html::admin.layouts.app', compact('seo', 'frd'))

@section('content')
    <form action="{{ $indexUrl }}" method="GET">
        <button type="submit" style="display: none">FixSubmitInputForm</button>
        @csrf
        <input type="hidden" name="{{ $sortField }}" value="{{ $frd[$sortField]??null }}">
        @if(count($clearFrd) > 0)
            <!-- Параметры других форм -->
            @foreach(explode('&', \Arr::query($clearFrd)) as $param)
                    <?php $param = explode('=', $param); ?>
                <input type="hidden" name="{{ $param[0]??null }}" value="{{ $param[1]??null }}">
            @endforeach
        @endif
        <input type="hidden" name="page" value="1">
        <div style="display: block;overflow-x: auto;padding-bottom: 0.75rem;">
            <table class="table table-striped table-hover table-column-small">
                <thead class="bg-primary">
                <tr>
                    @if($isSelect)
                        <th>
                            @isset($selectedActionsTemplate)
                                @include($selectedActionsTemplate)
                            @endisset
                        </th>
                    @endif
                    @foreach($fields as $name=>$field)
                        @if($field['active'])
                            <th>
                                <button type="submit"
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
                        <th>
                            <div class="form-group">
                                @if($selectedType === 'notSelected' || $selectedType === 'selected')
                                    <a href="{{ $urlForSelectedAll }}"
                                       class="table-checkbox form-checkbox form-inline" style="box-shadow: none">
                                        <i class="form-icon"></i>
                                    </a>
                                @elseif($selectedType === 'allSelected')
                                    <a href="{{ $urlForSelectedEmpty }}"
                                       class="table-checkbox form-checkbox form-inline checked"
                                       style="box-shadow: none">
                                        <i class="form-icon"></i>
                                    </a>
                                @endif
                            </div>
                        </th>
                    @endif
                    @foreach($fields as $name=>$field)
                        @if($field['active'])
                            <th class="table-column-{{ $name }}">
                                @isset($field['type'])
                                    <input type="hidden" value="{{ $field['operator'] ?? '==' }}"
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
                                @endif
                            </th>
                        @endif
                    @endforeach
                    <th class="text-right">
                        <button class="btn btn-action btn-link" type="submit"><i class="icon icon-search"></i></button>
                        <a href="{{ $clearUrl }}" class="btn btn-action btn-link ml-1"><i
                                class="icon icon-cross"></i></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        @if($isSelect)
                            <td>
                                <div class="form-group">
                                    <label class="table-checkbox form-checkbox form-inline">
                                        <input type="checkbox" name="{{ $selectedField }}[]"
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
                                <input type="checkbox" name="{{ $fieldsField }}[]"
                                       value="{{ $name }}" @checked($field['active'])>
                                <i class="form-icon"></i> {{ $field['label'] }}
                            </label>
                        </div>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary float-left" type="submit">Применить</button>
                    <a href="#close" class="btn">Закрыть</a>
                </div>
            </div>
        </div>
    </form>
@endsection
