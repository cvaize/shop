<div class="dropdown" style="margin: -0.3rem -0.2rem;">
    <button class="btn btn-action btn-link-white dropdown-toggle" tabindex="0" type="button">
        <i class="icon icon-more-vert"></i>
    </button>
    <!-- menu component -->
    <ul class="menu">
        <li class="menu-item">
            <a href="#modal-list-delete-selected" class="text-error"
               style="white-space: nowrap">
                Удалить выбранное
            </a>
        </li>
    </ul>
</div>

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
            <button class="btn btn-error float-left" type="submit" formaction="{{ route('admin.users.destroySelected') }}"
                    formmethod="post">
                Удалить
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
