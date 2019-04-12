{!!
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
    @include($fields)
    {{ $custom ?? null }}
</div>
<div class="card-footer">
    <div class="row">
        <div class="col">
            @isset($link_cancel)
                @php
                    $domainGet= app('request')->get('domain-name');
                    $domainGet = is_null($domainGet)?'':"?domain-name={$domainGet}";
                @endphp
                <a href="{{ $link_cancel.$domainGet }}" class="btn btn-warning btn-sm">Go Back</a>
            @endif
        </div><!--col-->
        <div class="col text-right">
            @isset($link_submit)
                {!! html()->input('submit', $link_submit ?? 'Submit', $link_submit ?? 'Submit')
                    ->class('btn btn-primary btn-sm btn-submit') !!}
            @endif
            @isset($link_submit_edit)
                {!! html()->input('submit', $link_submit_edit ?? 'Save and Continue',$link_submit_edit ?? 'Save and Continue')
                    ->class('btn btn-success btn-sm btn-submit-continue')
                    ->attribute('data-redirect', $link_submit_edit_redirect ?? null) !!}
            @endif
        </div><!--row-->
    </div><!--row-->
</div>
{!! html()->form()->close() !!}



