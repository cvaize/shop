@include('Html::admin.components.layouts.list.link-create')
{{--<a href="{{ route('admin.languages.create') }}" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>--}}

@include('Html::admin.components.layouts.list.modal-create', [
    'action' => route('admin.languages.store'),
    'form' => 'Html::admin.components.pages.languages.form',
    'formParams' => ['item' => null, '_action' => 'languages-create'],
])
