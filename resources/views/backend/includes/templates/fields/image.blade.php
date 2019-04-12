<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

	<div class="panel-group">
	          
	    <div class="panel panel-default">

	        <div class="panel-heading">

	            <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

	                ☰ Image(s) 

					@php

                        $image_align = $content->property->image_align;
                    
                    @endphp

                    <div class="image-align">
                        Image Align: 
                        <input type="radio" name="image-align-{{ $content->id }}" {{ $image_align == 'center' ? 'checked' : '' }} value="center"> Center
                        <input type="radio" name="image-align-{{ $content->id }}" {{ $image_align == 'left' ? 'checked' : '' }} value="left"> Left
                        <input type="radio" name="image-align-{{ $content->id }}" {{ $image_align == 'right' ? 'checked' : '' }} value="right"> Right
                        <input type="radio" name="image-align-{{ $content->id }}" {{ $image_align == 'container-100' ? 'checked' : '' }} value="container-100"> Container 100%
                        <input type="radio" name="image-align-{{ $content->id }}" {{ $image_align == 'fluid-100' ? 'checked' : '' }} value="fluid-100"> Fluid 100%
                    </div>

	                <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

	            </div>

	        </div>

	        <div id="collapse-template-{{ $content->id }}" class="panel-collapse collapse">
				
				<div class="row">
                    
                    <div class="col-md-12">

                        <image-uploader
                            :api-mode="true"
                            :multiple="true"
                            :uploads="{{ json_encode($content->getUploaderImages('images', 'thumbnail')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'content', 'routeKeyValue' => $content->id, 'collection' => 'images'])) }}"
                        ></image-uploader>
                     
						<br>
						<textarea name="{{ $content->id }}" class="form-control form-ckeditor" id="text-{{ $content->id }}" rows="5" placeholder="Enter Text">{!! $content->body !!}</textarea>

						@push('after-scripts')

		                	<script> CKEDITOR.replace('text-' + {{ $content->id }}, options); </script>

		                @endpush

                    </div>

                </div>

	        </div>

	    </div>

	</div>
	
</li>