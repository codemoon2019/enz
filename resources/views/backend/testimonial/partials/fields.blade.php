@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

    <style>
        .video-div{
            display: none;
        }
    </style>

@endpush

<div class="row mt-4 mb-4">

    <div class="col">

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Type <i class="text-danger">*</i></label>
    
            <div class="col-md-10">

                @if (isset($model))
                    <select class="form-control" name="type" id="testimonial-type">
                        
                        <option value="text" {{ $model->type =='text' ? 'selected' : '' }}>Text</option>
                        
                        <option value="video" {{ $model->type =='video' ? 'selected' : '' }}>Video</option>

                    </select>
                @else
                    <select class="form-control" name="type" id="testimonial-type">
                        
                        <option value="text">Text</option>
                        
                        <option value="video">Video</option>

                    </select>
                @endif

            </div>
    
        </div>

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Name <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
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

        <div class="text-div testimonial-div">
        
            <div class="form-group row">
        
                <label class="col-md-2 form-control-label">Position</label>
        
                <div class="col-md-10">
        
                    <input type="text" name="position" id="position" class="form-control" value="{{ isset($model) ? $model->position : old('old') }}">
        
                </div>
        
            </div>
        
            <div class="form-group row">
        
                <label class="col-md-2 form-control-label">Address</label>
        
                <div class="col-md-10">
        
                    <input type="text" name="address" id="address" class="form-control" value="{{ isset($model) ? $model->address : old('old') }}">
        
                </div>
        
            </div>
        
            <div class="form-group row">
        
                <label class="col-md-2 form-control-label">Description</label>
        
                <div class="col-md-10">
        
                    <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('old') !!}</textarea>
        
                </div>
        
            </div>

            <div class="form-group row">

                <label class="col-md-2 form-control-label">Featured Image<br/></label>
                
                <div class="col-md-10">
                
                    @if(isset($model))

                        <image-uploader
                            :api-mode="true"
                            :multiple="false"
                            :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'testimonial', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                        ></image-uploader>

                    @else
                
                        <image-uploader></image-uploader>
                
                    @endif
                
                </div>
            
            </div>

        </div>

        <div class="video-div testimonial-div">
            
            <div class="form-group row">
        
                <label class="col-md-2 form-control-label">Youtube Key <i class="text-danger">*</i></label>
        
                <div class="col-md-10">
        
                    <input type="text" name="youtube_key" class="form-control" value="{{ isset($model) ? $model->youtube_key : old('youtube_key') }}">
        
                </div>
        
            </div>
    
            <p>Instruction: Copy the last parameter of the youtube url and paste it to the youtube key field above.</p>
        
            <img src="{{ asset('img/youtube.png') }}" alt="">


        </div>

    </div>

</div>

@push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        // CKEDITOR.replace('description', options);

        function type() {

            $('.testimonial-div').hide();

            if ($('#testimonial-type').val() == 'video') {

                $('.video-div').show();

            }else{
                
                $('.text-div').show();

            }
        
        }

        type();

        $('#testimonial-type').change(function(){

            type();

        });
        
    </script>

@endpush