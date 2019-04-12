<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

	<div class="panel-group">
	          
	    <div class="panel panel-default">

	        <div class="panel-heading">

	            <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

	                ☰ Text by Column

	                <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

	            </div>

	        </div>

	        <div id="collapse-template-{{ $content->id }}" class="panel-collapse collapse">

	        	<div style="text-align: right; margin-top: 10px;">

	        		<button type="button" class="btn btn-primary add-text-column" data-id="{{ $content->id }}">Add Column</button>
	        	
	        	</div>
				
				@php

					$body = false;

					if ($content->body != null) {

						$body = json_decode($content->body);

					}

				@endphp

				<div class="text-column">
					
					<label class="text-column-label">Column 1</label>

					<textarea name="{{ $content->id }}[]" class="form-control" rows="5" placeholder="Enter Text" id="text-column-a">{!! $body ? $body[0] : '' !!}</textarea>

				</div>

				<div class="text-column">
					
					<label class="text-column-label">Column 2</label>
					
					<textarea name="{{ $content->id }}[]" class="form-control" rows="5" placeholder="Enter Text" id="text-column-b">{!! $body ? $body[1] : '' !!}</textarea>

				</div>

				@if ($body)
				
					@foreach (array_slice($body, 2) as $key => $column)

						<div class="text-column">
							
							<label class="text-column-label">Column {{ $key + 3 }}</label>

							<span class="fa fa-close pull-right text-column-delete btn-action" 
								  data-type="delete-text-column" 
								  href="{{ route('webapi.admin.template.delete.column', [$content->id, $key+2]) }}" 
								  data-id="{{ $content->id }}" 
								  data-column="{{ $key+2 }}">
							</span>

							<textarea name="{{ $content->id }}[]" class="form-control" rows="5" placeholder="Enter Text" id="text-column-{{ $key }}">{!! $column !!}</textarea>

							@push('after-scripts')

								<script>
	    							
	    							CKEDITOR.replace('text-column-{{ $key }}', options);
									
								</script>

							@endpush

						</div>
			
					@endforeach


				@endif


	        </div>

	    </div>

	</div>
	
</li>

@push('after-scripts')

<script>

    CKEDITOR.replace('text-column-a', options);

    CKEDITOR.replace('text-column-b', options);

	var column_no = 3;
	
	@if ($body)

		column_no = "{{ count($body) + 1 }}"
	
	@endif

	$('.add-text-column').click(function(){

		el = $(this);

		html = `<div class="text-column text-column-`+column_no+`">
					
					<label class="text-column-label">Column `+column_no+`</label>

					<span class="fa fa-close pull-right text-column-delete btn-action" data-id="`+column_no+`" data-type="delete-text-column" data-save="false"></span>

					<textarea name="`+el.attr('data-id')+`[]" class="form-control" id="text-column-`+column_no+`" rows="5" placeholder="Enter Text"></textarea>

				</div>`;

		$('#collapse-template-' + el.attr('data-id')).append(html);

	    CKEDITOR.replace('text-column-' + column_no, options);

		column_no++;

	});

</script>

@endpush