<div class="row mt-4 mb-4">

    <div class="col">

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Description</label>
    
            <div class="col-md-10">
    
                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('old') !!}</textarea>
    
            </div>
    
        </div>       

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured Image (svg file)</label>

            <div class="col-md-10 image-div">

                <input type="file" name="icon">

            </div>

        </div>

        @if (isset($model))

            <div class="form-group row">

                <label class="col-md-2 form-control-label"></label>

                <div class="col-md-10 image-div">

                    <img src="{{ $model->featured_icon }}" alt="">

                </div>

            </div>

        @endif

    </div>

</div>