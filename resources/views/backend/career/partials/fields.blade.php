@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Location <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <textarea name="location" id="location" class="form-control">{!! isset($model) ? $model->location : old('location') !!}</textarea>
    
            </div>
    
        </div>
        
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Description</label>
    
            <div class="col-md-10">
    
                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('description') !!}</textarea>
    
            </div>
    
        </div>
        
        <div class="form-group row">

            <label class="col-md-2 form-control-label" for="content">Status</label>

            <div class="col-md-10">
            
                <label class="switch switch-3d switch-primary">

                    <input type="checkbox" name="status" class="switch-input" value="1" {{ isset($model) ? ($model->status == 'enable' ? 'checked' : ''): '' }}>

                    <span class="switch-slider"></span>
    
                </label>
            
            </div>
        
        </div>

    </div>

</div>

@push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        CKEDITOR.replace('description', options);
        CKEDITOR.replace('location', options);
        
    </script>

@endpush