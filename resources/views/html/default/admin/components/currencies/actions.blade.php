<a href="#modal-currencies-create" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>
{{--<a href="{{ route('admin.currencies.create') }}" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>--}}

<div class="modal modal-sm text-left text-dark" id="modal-currencies-create">
    <a href="#close" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Создание валюты</div>
        </div>
        <div class="modal-body">
            <form id="form-currencies-store" action="{{ route('admin.currencies.store') }}" method="post">
                @csrf
                <input type="hidden" name="anchor" value="modal-currencies-create">
                @include('Html::admin.components.currencies.form', ['item' => null])
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success float-left" type="submit" form="form-currencies-store">
                Создать
            </button>
            <a href="#close" class="btn">Закрыть</a>
        </div>
    </div>
</div>
