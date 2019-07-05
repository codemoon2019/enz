@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush --}}

<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>

        <div class="form-group row" style="display: none;">
    
            <label class="col-md-2 form-control-label">Institution <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                @if (!isset($model))

                    @php
                        $url = explode('/', url()->current());
                        $institution = findInstitution($url[count($url) - 1]);
                    @endphp

                    <input type="text" name="institution_id" class="form-control" value="{{ $institution->id }}">

                @endif
    
            </div>
    
        </div>

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Area of Study <i class="text-danger">*</i></label>
    
            <div class="col-md-10">

                @if (isset($model))
                
                    <select name="area_of_study_id" id="area_of_study_id" class="form-control">
                        @foreach (AreaOfStudy() as $area)
                            <option value="{{ $area->id }}" {{ $area->id == $model->area_of_study_id ? 'selected' : '' }}>{{ $area->title }}</option>
                        @endforeach
                    </select>

                @else

                    <select name="area_of_study_id" id="area_of_study_id" class="form-control">
                        @foreach (AreaOfStudy() as $area)
                            <option value="{{ $area->id }}">{{ $area->title }}</option>
                        @endforeach
                    </select>
                
                @endif

    
            </div>
    
        </div>

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Description</label>
    
            <div class="col-md-10">
    
                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('old') !!}</textarea>
    
            </div>
    
        </div>

{{--         <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Carrer Opportunities</label>
    
            <div class="col-md-10">
    
                <textarea name="career_opportunities" id="career_opportunities" class="form-control">{!! isset($model) ? $model->career_opportunities : old('old') !!}</textarea>
    
            </div>
    
        </div>

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Duration</label>
    
            <div class="col-md-10">
    
                <textarea name="duration" id="duration" class="form-control">{!! isset($model) ? $model->duration : old('old') !!}</textarea>
    
            </div>
    
        </div>

        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Availability</label>
    
            <div class="col-md-10">
    
                <textarea name="availability" id="availability" class="form-control">{!! isset($model) ? $model->availability : old('old') !!}</textarea>
    
            </div>
    
        </div> --}}

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured Image<br/></label>
            
            <div class="col-md-10">
            
                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'course', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
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


{{-- @push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        CKEDITOR.replace('description', options);
        
    </script>

@endpush