<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Percentage</label>
        
            <div class="col-md-10">

                <input type="number" name="percentage" class="form-control" value="{{ isset($model) ? $model->percentage : old('percentage') }}">
    
            </div>
    
        </div>

    </div>

</div>