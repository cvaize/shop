@include('Html::admin.components.layouts.list.link-create')
{{--<a href="{{ route('admin.users.create') }}" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>--}}

@include('Html::admin.components.layouts.list.modal-create', [
    'action' => route('admin.users.store'),
    'form' => 'Html::admin.components.pages.users.form',
    'formParams' => ['item' => null, '_action' => 'users-create'],
])
