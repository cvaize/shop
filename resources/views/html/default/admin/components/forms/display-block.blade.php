<?php $rand = rand(1, 9999999); ?>
<input id="display-block-{{ $rand }}" type="checkbox" class="display-block" checked>
<div class="{{ $class }} display-block-block">
    <label for="display-block-{{ $rand }}" class="btn btn-clear float-right"></label>
    {{ $content }}
</div>
