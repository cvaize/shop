<?php
/** @var \App\Models\Currency $item */
?>
<div class="text-right">
    <a href="#modal-currencies-{{ $item->getKey() }}-copy" class="btn btn-action btn-link"><i
            class="icon icon-copy"></i></a>
    <a href="#modal-currencies-{{ $item->getKey() }}-delete"
       class="btn btn-action btn-link-error ml-1"><i class="icon icon-delete"></i></a>
</div>

<div class="modal modal-sm" id="modal-currencies-{{ $item->getKey() }}-delete">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Подтвердите удаление</div>
        </div>
        <div class="modal-body">
            Подтверждаете удаление <br><b>{{ '#' . $item->getKey() . ' - ' . $item->label }}</b>?
            <form id="form-currencies-{{ $item->getKey() }}-destroy"
                  action="{{ route('admin.currencies.destroy', compact('item')) }}" method="post">
                @csrf
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-error float-left" type="submit" form="form-currencies-{{ $item->getKey() }}-destroy">
                Удалить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>

<div class="modal modal-sm text-dark" id="modal-currencies-{{ $item->getKey() }}-edit">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Изменение</div>
        </div>
        <div class="modal-body">
            <form id="form-currencies-{{ $item->getKey() }}-update"
                  action="{{ route('admin.currencies.update', compact('item')) }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-currencies-{{ $item->getKey() }}-edit">
                @include('Html::admin.components.currencies.form', compact('item'))
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success float-left" type="submit"
                    form="form-currencies-{{ $item->getKey() }}-update">
                Обновить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>

<div class="modal modal-sm text-dark" id="modal-currencies-{{ $item->getKey() }}-copy">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Копирование</div>
        </div>
        <div class="modal-body">
            <form id="form-currencies-{{ $item->getKey() }}-copy"
                  action="{{ route('admin.currencies.store') }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-currencies-{{ $item->getKey() }}-copy">
                @include('Html::admin.components.currencies.form', compact('item'))
            </form>
        </div>
        <div class="modal-footer">
            <button form="form-currencies-{{ $item->getKey() }}-copy"
                    class="btn btn-success float-left" type="submit">
                Создать
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
