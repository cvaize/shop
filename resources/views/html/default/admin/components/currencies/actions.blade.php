@include('Html::admin.components.layouts.list.link-create')
{{--<a href="{{ route('admin.currencies.create') }}" class="btn btn-action btn-link-white"><i class="icon icon-plus"></i></a>--}}

@component('Html::admin.components.layouts.list.modal-create', [
    'action' => route('admin.currencies.store')
])
    @slot('form')
        @include('Html::admin.components.currencies.form', ['item' => null])
    @endslot
@endcomponent
