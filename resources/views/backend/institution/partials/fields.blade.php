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
    
        <div class="form-group row" style="display: none;">
    
            <label class="col-md-2 form-control-label">Country <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                @if (isset($model))

                    <input type="text" name="country_id" class="form-control" value="{{ $model->country->id }}">
                
                @else

                    @php
                        $url = explode('/', url()->current());
                        $country = findCountry($url[count($url) - 1]);
                    @endphp

                    <input type="text" name="country_id" class="form-control" value="{{ $country->id }}">

                @endif
    
            </div>
    
        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured Image<i class="text-danger">*</i><br/></label>
            
            <div class="col-md-10">
            
                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'institution', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else
            
                    <image-uploader></image-uploader>
            
                @endif
            
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
        
    </script>

@endpush