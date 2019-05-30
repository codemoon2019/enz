<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('title', old('title'))
                    ->class('form-control ' . ($errors->has('title') ? 'is-invalid' : '' ))
                    ->placeholder('Enter title')
                    ->autofocus(true) !!}
            </div>
        </div>
    </div>
</div>
