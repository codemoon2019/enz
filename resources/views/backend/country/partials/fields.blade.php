@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" readonly name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Description</label>
    
            <div class="col-md-10">
    
                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('old') !!}</textarea>
    
            </div>
    
        </div>
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Color</label>
    
            <div class="col-md-10">
    
                <select name="color" class="form-control">

                    <option value="teal" {{ isset($model) ? ($model->color == 'teal' ? 'selected' : '') : '' }}>Teal</option>
                    
                    <option value="red" {{ isset($model) ? ($model->color == 'red' ? 'selected' : '') : '' }}>Red</option>
                    
                    <option value="orange" {{ isset($model) ? ($model->color == 'orange' ? 'selected' : '') : '' }}>Orange</option>
                
                </select>
    
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
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'country', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else
            
                    <image-uploader></image-uploader>
            
                @endif
            
            </div>
        
        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">slider<br/></label>
            
            <div class="col-md-10">
            
                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="true"
                        :uploads="{{ json_encode($model->getUploaderImages('slider', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'country', 'routeKeyValue' => $model->slug, 'collection' => 'slider'])) }}"
                    ></image-uploader>

                @else
            
                    <image-uploader></image-uploader>
            
                @endif
            
            </div>
        
        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Details<br/></label>
            
            <div class="col-md-10">
            
                <div class="form-group row">
                        
                    <label class="col-md-2 form-control-label">Capital<br/></label>

                    <div class="col-md-10">
            
                        <input type="text" placeholder="Description" name="capital" class="form-control" value="{{ isset($model) ? $model->capital : old('capital') }}">
                        
                        <input type="file" name="capital_icon">

                        <img src="{{ $model->capital_icon }}" alt="">
            
                    </div>

                </div>
            
                <div class="form-group row">
                        
                    <label class="col-md-2 form-control-label">Founded<br/></label>

                    <div class="col-md-10">
            
                        <input type="text" placeholder="Description" name="founded" class="form-control" value="{{ isset($model) ? $model->founded : old('founded') }}">
                        
                        <input type="file" name="founded_icon">

                        <img src="{{ $model->founded_icon }}" alt="">
            
                    </div>

                </div>
            
                <div class="form-group row">
                        
                    <label class="col-md-2 form-control-label">Area<br/></label>

                    <div class="col-md-10">
            
                        <input type="text" placeholder="Description" name="area" class="form-control" value="{{ isset($model) ? $model->area : old('area') }}">
                        
                        <input type="file" name="area_icon">

                        <img src="{{ $model->area_icon }}" alt="">
            
                    </div>

                </div>
            
                <div class="form-group row">
                        
                    <label class="col-md-2 form-control-label">Population<br/></label>

                    <div class="col-md-10">
            
                        <input type="text" placeholder="Description" name="population" class="form-control" value="{{ isset($model) ? $model->population : old('population') }}">
                        
                        <input type="file" name="population_icon">

                        <img src="{{ $model->population_icon }}" alt="">
            
                    </div>

                </div>
            
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