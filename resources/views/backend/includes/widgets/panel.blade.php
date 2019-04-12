<div class="card {{ $class ?? '' }}">
    @if(isset($title) && $title)
    <div class="card-header" role="tab" id="{{ $id."-head" }}">
        <h5 class="mb-0">
            <a data-toggle="{{ isset($disable) && $disable ? '' : 'collapse' }}" href="#{{ $id }}" aria-expanded="true" aria-controls="{{ $id }}" class="">
                {!! isset($icon) && $icon ? '<i class="'.$icon.'"></i>' : '' !!} {{ $title }}
            </a>
        </h5>
    </div>
    @endif
    <div id="{{ $id }}" class="collapse show" role="tabpanel" aria-labelledby="{{ $id."-head" }}">
        <div class="card-body">
            {{ $body }}
        </div>
    </div>
</div>