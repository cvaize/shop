<?php
$selectedDestroyAction = $selectedDestroyAction ?? null;
?>
<div class="dropdown" style="margin: -0.3rem -0.2rem;">
    <button class="btn btn-action btn-link-white dropdown-toggle" tabindex="0" type="button">
        <i class="icon icon-more-vert"></i>
    </button>
    <!-- menu component -->
    <ul class="menu">
        @isset($selectedDestroyAction)
            <li class="menu-item">
                @include('Html::admin.components.layouts.list.link-delete-selected')
            </li>
        @endisset
    </ul>
</div>

@isset($selectedDestroyAction)
    @include('Html::admin.components.layouts.list.modal-delete-selected', ['action' => $selectedDestroyAction])
@endisset
