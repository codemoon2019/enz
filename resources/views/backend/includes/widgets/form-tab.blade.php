{{-- {!!
    html()->modelForm($model ?? null, $method ?? 'POST', $url)
        ->acceptsFiles()
        ->attribute('accept-charset', 'UTF-8')
        ->attribute('id', $form_id)
        ->class('card card-form form-horizontal' . ($class ?? ''))
        ->open()
!!}
<div class="card-body">
    <div class="row">
        <div class="col-sm-10">
            <h4 class="card-title mb-0">
                {{ $title }} <br/>
                <small class="text-muted">{{ $secondary_title ?? '' }}</small>
            </h4>
        </div><!--col-->
    </div><!--row-->
    <hr/>

    <ul class="nav nav-tabs">
        @foreach($tabs as $key => $tab)
            <li class="nav-item">
                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="{{ $tab['id'] }}-tab" data-toggle="tab"
                   href="#{{ $tab['id'] }}" role="tab" aria-controls="{{ $tab['id'] }}"
                   aria-selected="true">{{ $tab['title'] }}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach($tabs as $key => $tab)
            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ $tab['id'] }}" role="tabpanel"
                 aria-labelledby="{{ $tab['id'] }}-tab">
                @include($tab['template'])
                {{ $custom ?? null }}
            </div>
        @endforeach
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col">
            <a href="{{ $link_cancel }}" class="btn btn-warning btn-sm">Go Back</a>
        </div><!--col-->
        <div class="col text-right">
            {!! html()->input('submit', $link_submit ?? 'Submit', $link_submit ?? 'Submit')
                ->class('btn btn-primary btn-sm btn-submit') !!}
            @isset($link_submit_edit)
                {!! html()->input('submit', $link_submit_edit ?? 'Save and Continue',$link_submit_edit ?? 'Save and Continue')
                    ->class('btn btn-success btn-sm btn-submit-continue')
                    ->attribute('data-redirect', $link_submit_edit_redirect ?? null) !!}
            @endif
        </div><!--row-->
    </div><!--row-->
</div>
{!! html()->form()->close() !!} --}}


@include('backend.includes.widgets.base-form.base-top-form')

    <ul class="nav nav-tabs">
        @foreach($tabs as $key => $tab)
            <li class="nav-item">
                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="{{ $tab['id'] }}-tab" data-toggle="tab"
                   href="#{{ $tab['id'] }}" role="tab" aria-controls="{{ $tab['id'] }}"
                   aria-selected="true">{{ $tab['title'] }}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach($tabs as $key => $tab)
            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ $tab['id'] }}" role="tabpanel"
                 aria-labelledby="{{ $tab['id'] }}-tab">
                @include($tab['template'])
                {{ $custom ?? null }}
            </div>
        @endforeach
    </div>

@include('backend.includes.widgets.base-form.base-bottom-form')