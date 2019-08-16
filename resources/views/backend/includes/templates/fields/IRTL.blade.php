<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

    <div class="panel-group">
              
        <div class="panel panel-default">

            <div class="panel-heading">

                <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

                    ☰ Image-Right : Text-Left 
                        
                    @php $image_area = $content->property->image_area; @endphp

                    <div class="image-area" style="display: none;">

                        Image Area: 
                        
                        <input type="radio" name="image-area-{{ $content->id }}" {{ $image_area == 6 ? 'checked' : '' }} value="6"> 1/2
                        
                        <input type="radio" name="image-area-{{ $content->id }}" {{ $image_area == 9 ? 'checked' : '' }} value="9"> 3/4
                        
                        <input type="radio" name="image-area-{{ $content->id }}" {{ $image_area == 3 ? 'checked' : '' }} value="3"> 1/3
                    
                    </div>

                    <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

                </div>

            </div>

            <div id="collapse-template-{{ $content->id }}" class="panel-collapse collapse" style="text-align: center; padding: 10px;">

                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <textarea class="form-control" id="text-{{ $content->id }}" name="{{ $content->id }}">{!! $content->body !!}</textarea>                

                        @push('after-scripts')

                            <script> CKEDITOR.replace('text-' + {{ $content->id }}, options); </script>

                        @endpush
                        
                        <br><br>
                        
                        <image-uploader
                            :api-mode="true"
                            :multiple="true"
                            :uploads="{{ json_encode($content->getUploaderImages('images', 'thumbnail')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'content', 'routeKeyValue' => $content->id, 'collection' => 'images'])) }}"
                        ></image-uploader>

                    </div>

                </div>
                
            </div>

        </div>

    </div>
    
</li>