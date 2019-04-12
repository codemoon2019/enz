<li id="field-{{ $content->id }}" data-id="{{ $content->id }}">

	<div class="panel-group">
	          
	    <div class="panel panel-default">

	        <div class="panel-heading">

	            <div class="title" data-toggle="collapse" href="#collapse-template-{{ $content->id }}">

	                ☰ {{ ucwords( str_replace('_', ' ', $content->template) ) }} List

	                <i class="fa fa-close delete-template btn-action" data-id="{{ $content->id }}" data-type="delete-template" data-save="true"></i>

	            </div>

	        </div>

	    </div>

	</div>
	
</li>