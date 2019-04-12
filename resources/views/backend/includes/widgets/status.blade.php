<div class="col-md-10">
    <label class="switch switch-pill switch-primary">
        {{--
        {!!
            html()->checkbox(
                'status',
                isset($model) ? $model->status == 'enable' : (old('status') ?? true),
                'enable'
            )
            ->class('switch-input')
        !!}
        --}}

        <input class="switch-input" type="checkbox" name="status" id="status"
               value="enable" {{ isset($model) ? ($model->status == 'enable'?'checked':'') : (old('status')==true?'checked':'') }}>

        <span class="switch-slider"></span>
    </label>
</div>