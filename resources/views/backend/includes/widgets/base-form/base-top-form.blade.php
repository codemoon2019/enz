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