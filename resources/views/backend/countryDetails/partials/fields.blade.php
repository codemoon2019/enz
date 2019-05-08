<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>
    
        <div class="form-group row" style="display: none;">
    
            <label class="col-md-2 form-control-label">Country <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
            
                @php
                    $url = explode('/', url()->current());
                @endphp

                <input type="text" name="country_id" class="form-control" value="{{ $url[count($url) - 1] }}">
    
            </div>
    
        </div>

    </div>

</div>