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
            <label class="col-md-2 form-control-label">Depth <i class="text-danger">*</i></label>
            <div class="col-md-10">
                <input type="number" name="depth" class="form-control" value="{{ isset($model) ? $model->depth : old('depth') }}" placeholder="Enter Depth">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Description</label>
            <div class="col-md-10">
                <textarea name="description" class="form-control">{{ isset($model) ? $model->description : old('description') }}</textarea>
            </div>
        </div>

    </div>

</div>
