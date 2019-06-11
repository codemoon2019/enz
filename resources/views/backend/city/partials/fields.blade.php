<div class="row mt-4 mb-4">

    <div class="col">
    
        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
    
            <div class="col-md-10">
    
                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">
    
            </div>
    
        </div>


        <div class="form-group row">
    
            <label class="col-md-2 form-control-label">Color</label>
    
            <div class="col-md-10">
    
                <select name="color" class="form-control">

                    <option value="teal" {{ isset($model) ? ($model->color == 'teal' ? 'selected' : '') : '' }}>Teal</option>
                    
                    <option value="red" {{ isset($model) ? ($model->color == 'red' ? 'selected' : '') : '' }}>Red</option>
                    
                    <option value="orange" {{ isset($model) ? ($model->color == 'orange' ? 'selected' : '') : '' }}>Orange</option>
                    
                    <option value="yellow" {{ isset($model) ? ($model->color == 'yellow' ? 'selected' : '') : '' }}>Yellow</option>
                
                </select>
    
            </div>
    
        </div>

        <div class="form-group row" style="display: none;">
    
            <label class="col-md-2 form-control-label">Country <i class="text-danger">*</i></label>
    
            <div class="col-md-10">

                @php
                    $url = explode('/', url()->current());
                    $country = findCountry($url[count($url) - 1]);
                @endphp

                <input type="text" name="country_id" class="form-control" value="{{ $country->id }}">
    
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
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'city', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else
            
                    <image-uploader></image-uploader>
            
                @endif
            
            </div>
        
        </div>

    </div>

</div>
