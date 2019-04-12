<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

	<div class="panel-group">
	          
	    <div class="panel panel-default">

	        <div class="panel-heading">

	            <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

	                ☰ Embed <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

	            </div>

	        </div>

	        <div id="collapse-template-{{ $content->id }}" class="panel-collapse collapse">

				<textarea name="{{ $content->id }}" class="form-control" rows="5" placeholder="Embed">{!! $content->body !!}</textarea>

	        </div>

	    </div>

	</div>
	
</li>