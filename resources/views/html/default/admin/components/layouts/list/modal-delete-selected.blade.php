<div class="modal modal-sm text-dark" id="modal-list-delete-selected">
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
            <button class="btn btn-error float-left" type="submit"
                    form="form-list-selected-actions"
                    formaction="{{ $action }}"
                    formmethod="post">
                Удалить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
