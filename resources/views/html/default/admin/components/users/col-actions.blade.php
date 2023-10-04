<?php
/** @var \App\Models\User $item */
?>
<div class="text-right">
    <a href="{{ route('admin.users.copy', compact('item')) }}" class="btn btn-action btn-link"><i
            class="icon icon-copy"></i></a>
    <a href="#modal-list-delete-{{ $item->getKey() }}"
       class="btn btn-action btn-link-error ml-1"><i class="icon icon-delete"></i></a>
</div>
<div class="modal modal-sm" id="modal-list-delete-{{ $item->getKey() }}">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Подтвердите удаление</div>
        </div>
        <div class="modal-body">
            Подтверждаете удаление <br><b>{{ '#' . $item->getKey() . ' - ' . $item->email . ($item->name ? " ($item->name)" : '') }}</b>?
        </div>
        <div class="modal-footer">
            <button class="btn btn-error float-left" type="submit"
                    formaction="{{ route('admin.users.destroy', compact('item')) }}" formmethod="post"
                    name="_token" value="{{ csrf_token() }}">
                Удалить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
