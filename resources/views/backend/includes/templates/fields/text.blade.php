<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

	<div class="panel-group">
	          
	    <div class="panel panel-default">

	        <div class="panel-heading">

	            <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

	                ☰ Text <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

	            </div>

	        </div>

	        <div id="collapse-template-{{ $content->id }}" class="panel-collapse collapse">

				<textarea name="{{ $content->id }}" class="form-control form-ckeditor" id="text-{{ $content->id }}" rows="5" placeholder="Enter Text">{!! $content->body !!}</textarea>

				@push('after-scripts')

                	<script> CKEDITOR.replace('text-' + {{ $content->id }}, options); </script>

                @endpush

	        </div>

	    </div>

	</div>
	
</li>