<div class="dropdown" style="margin: -0.3rem -0.2rem;">
    <button class="btn btn-action btn-link-white dropdown-toggle" tabindex="0" type="button">
        <i class="icon icon-more-vert"></i>
    </button>
    <!-- menu component -->
    <ul class="menu">
        <li class="menu-item">
            @include('Html::admin.components.layouts.list.link-delete-selected')
        </li>
    </ul>
</div>

@include('Html::admin.components.layouts.list.modal-delete-selected', ['action' => route('admin.languages.selectedDestroy')])
