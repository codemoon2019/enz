<div class="row">
    @foreach($menus as $b => $menu)
        <div class="col-sm-4 ql-container">
            @include('frontend.includes.widgets.quick-link', ['model' => $menu])
            @include($menu::VIEW_FRONTEND_PATH . ".templates.$menu->template", ['menu' => $menu])
        </div>
    @endforeach
</div>