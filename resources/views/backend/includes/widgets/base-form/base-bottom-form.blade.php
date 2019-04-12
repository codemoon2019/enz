
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
                {!! html()->input('submit', $link_submit , $link_submit)
                    ->class('btn btn-primary btn-sm btn-submit') !!}
            @endif
            @isset($link_submit_edit)
                {!! html()->input('submit', $link_submit_edit,$link_submit_edit )
                    ->class('btn btn-success btn-sm btn-submit-continue')
                    ->attribute('data-redirect', $link_submit_edit_redirect ?? null) !!}
            @endif
        </div><!--row-->
    </div><!--row-->
</div>


{!! html()->closeModelForm() !!}