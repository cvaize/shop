<div class="modal modal-sm" id="modal-list-{{ $key }}-delete">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Подтвердите удаление</div>
        </div>
        <div class="modal-body">
            Подтверждаете удаление <br><b>{{ $label }}</b>?
            <form id="form-list-{{ $key }}-destroy"
                  action="{{ $action }}" method="post">
                @csrf
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-error float-left" type="submit" form="form-list-{{ $key }}-destroy">
                Удалить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
