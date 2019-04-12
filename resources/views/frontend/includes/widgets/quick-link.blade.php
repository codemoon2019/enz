@can(config('access.users.default_permissions.back_end_view_permission'))
@php
	$actions = isset($actions) ? $actions : $model->actions('backend', ['edit']);
@endphp
@if(count($actions))
<div class="quick-link clearfix">
		<button type="button" class="contextual-link-btn" data-tooltip="tooltip" title="Configure" data-toggle="dropdown" aria-expanded="false">
				<?xml version="1.0" encoding="UTF-8"?>
				<svg width="15" height="15" enable-background="new 0 0 485.219 485.22" version="1.1" viewBox="0 0 485.22 485.22" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
					<path d="m467.48 146.44-21.445 21.455-128.68-128.66 21.445-21.457c23.689-23.692 62.104-23.692 85.795 0l42.886 42.897c23.657 23.679 23.657 62.078 0 85.768zm-300.24 257.31c-5.922 5.922-5.922 15.513 0 21.436 5.925 5.955 15.521 5.955 21.443 0l235.91-235.85-21.469-21.457-235.89 235.87zm-107.23-107.21c-5.925 5.927-5.925 15.514 0 21.44 5.922 5.923 15.518 5.923 21.443 0l235.91-235.87-21.436-21.443-235.91 235.87zm278.77-193-235.89 235.88c-11.845 11.822-11.815 31.041 0 42.886 11.85 11.846 31.038 11.901 42.914-0.032l235.89-235.84-42.914-42.898zm-193.03 343.03c-7.253-7.262-10.749-16.465-12.05-25.948-3.083 0.476-6.188 0.919-9.36 0.919-16.202 0-31.419-6.333-42.881-17.795-11.462-11.491-17.77-26.687-17.77-42.887 0-2.954 0.443-5.833 0.859-8.703-9.803-1.335-18.864-5.629-25.972-12.737-0.682-0.677-0.917-1.596-1.538-2.338l-37.022 148.13 147.75-36.986c-0.651-0.593-1.388-1.037-2.014-1.658z" fill="#21333e"/>
				</svg>
		</button>
		<ul class="dropdown-menu" role="menu">
			@foreach($actions as $a => $action)
				<li><a href="{{ $action['url'] }}" class="text-capitalize">{{ str_replace('-', ' ', ($action['type'] == 'custom' ? $action['label'] : $action['type'])) }}</a></li>
			@endforeach
		</ul>
</div>
@endif
@endcan