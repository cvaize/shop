<div class="modal modal-sm text-dark" id="modal-list-{{ $key }}-edit">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Изменение</div>
        </div>
        <div class="modal-body">
            <form id="form-list-{{ $key }}-update"
                  action="{{ $action }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-list-{{ $key }}-edit">
                @include($form, [...$formParams, '_action' => 'update'])
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success float-left" type="submit"
                    form="form-list-{{ $key }}-update">
                Обновить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
