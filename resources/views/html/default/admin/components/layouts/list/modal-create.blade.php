<div class="modal modal-sm text-left text-dark" id="modal-list-create">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Создание</div>
        </div>
        <div class="modal-body">
            <form id="form-list-store" action="{{ $action }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-list-create">
                @include($form, [...$formParams, '_action' => 'create'])
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success float-left" type="submit" form="form-list-store">
                Создать
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
