@can($MODEL->permission('index'))

    <li class="dropdown-item">

        <a href="{{ route('admin.pages.index') }}"><i class="fa fa-list"></i> {{ __('core_page.label.plural') }}</a>

    </li>

@endcan

{{-- @can($MODEL->permission('create')) --}}

	<li class="dropdown-item">

		<a href="{{ route('admin.pages.create') }}" class="text-success"><i class="fa fa-plus"></i> {{ __('core_page.links.add') }}</a>

	</li>

{{-- @endcan --}}

{{--@can($MODEL->permission('change-status'))--}}
{{--<li class="dropdown-item">--}}
{{--<a href="{{ route('admin.pages.status', 'enable') }}"><i--}}
{{--class="fa fa-check"></i> {{ __('core_page.links.enabled') }}</a>--}}
{{--</li>--}}
{{--@endcan--}}
{{--@can($MODEL->permission('change-status'))--}}
{{--<li class="dropdown-item">--}}
{{--<a href="{{ route('admin.pages.status', 'disable') }}" class="text-danger"><i--}}
{{--class="fa fa-ban"></i> {{ __('core_page.links.disabled') }}</a>--}}
{{--</li>--}}
{{--@endcan--}}