<nav class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($links as $l => $link)
        <a href="#tab-{{ str_slug($link['name']) }}" class="nav-link nav-item {{ $l == 0 ? 'active' : '' }}"
           data-toggle="pill" role="tab" aria-controls="tab-{{ str_slug($link['name']) }}" aria-expanded="true">
            <i class="{{ array_key_value_exists('icon', $link) }}"></i> {{ $link['name'] }}
        </a>
    @endforeach
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach($links as $l => $link)
        <div class="tab-pane fade {{ $l == 0 ? 'show active' : '' }}" id="tab-{{ str_slug($link['name']) }}"
             role="tabpanel" aria-labelledby="tab-{{ str_slug($link['name']) }}">
            @include($link['template'], $link['args'])
        </div>
    @endforeach
</div>