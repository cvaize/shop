<div class="modal modal-sm text-dark" id="modal-list-{{ $key }}-copy">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Копирование</div>
        </div>
        <div class="modal-body">
            <form id="form-list-{{ $key }}-copy"
                  action="{{ $action }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-list-{{ $key }}-copy">
                {{ $form }}
            </form>
        </div>
        <div class="modal-footer">
            <button form="form-list-{{ $key }}-copy"
                    class="btn btn-success float-left" type="submit">
                Создать
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
