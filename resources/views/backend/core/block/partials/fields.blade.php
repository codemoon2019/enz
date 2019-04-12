<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                @if (isset($model))

                    <input type="text" readonly class="form-control" value="{{ $model->title }}">

                @else

                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                @endif
    
            </div>
    
        </div>
    
    </div>

</div>
