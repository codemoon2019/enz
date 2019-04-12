<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Name <i class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('name', isset($model) ? $model->name : old('name'))
                    ->class('form-control ' . ($errors->has('name') ? 'is-invalid' : '' ))
                    ->placeholder('Enter name')
                    ->autofocus(true) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">URL <i class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('url', isset($model) ? $model->url : old('url'))
                    ->class( 'form-control ' . ($errors->has('url') ? 'is-invalid' : '' ))
                    ->placeholder('Enter url')
                    ->autofocus(true) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">Parent</label>
            <div class="col-md-10">
                <select name="parent_id" id="" class="form-control">
                    <option value="1">Main Menu</option>

                </select>
                {{-- {!! 
                    html()->select(
                        'parent_id',
                        menu($menu)->inForm(isset($model) ? $model->id : null, null, false), 
                        isset($model) ? $model->menu_id .'_'. $model->parent_id : old('parent_id')
                    )
                    ->class('form-control ' . ($errors->has('parent_id') ? 'is-invalid' : '' ))
                    ->placeholder('Enter parent')
                !!} --}}
            </div>
        </div>
    </div>
</div>
