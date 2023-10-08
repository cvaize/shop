@include('Html::admin.components.layouts.list.link-create')
{{--<a href="{{ route('admin.currencies.create') }}" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>--}}

@include('Html::admin.components.layouts.list.modal-create', [
    'action' => route('admin.currencies.store'),
    'form' => 'Html::admin.components.currencies.form',
    'formParams' => ['item' => null],
])
