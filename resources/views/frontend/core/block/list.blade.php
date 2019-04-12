<div class="row">
    @foreach($blocks as $b => $block)
        <div class="col-sm-4">
            @include($block::VIEW_FRONTEND_PATH . ".templates.$block->template", ['block' => $block])
        </div>
    @endforeach
</div>