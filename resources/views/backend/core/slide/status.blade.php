@extends('backend.layouts.app')
@section ('title', 'Slide ' . ucfirst($type) . ' List' . ' - Slide Management | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Slide\Slide')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.slides.table'))
        @slot('form_data', json_encode([ $statusKey => $type ]))
        @slot('table_name', 'slide-table')
        @slot('title', 'Slide ' . ucfirst($type) . ' List')
        @slot('secondary_title', 'Slide Management')
        @slot('links')
            @can($MODEL->permission('index'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.slides.index') }}"><i class="fa fa-list"></i> Slides</a>
                </li>
            @endcan
            {{--@can($MODEL->permission('create'))--}}
            {{--<li class="dropdown-item">--}}
            {{--<a href="{{ route('admin.slides.create') }}" class="text-success"><i class="fa fa-plus"></i> Add Slide</a>--}}
            {{--</li>--}}
            {{--@endcan--}}
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.slides.status', 'enable') }}"><i class="fa fa-check"></i> Enabled
                        Slides</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.slides.status', 'disable') }}" class="text-danger"><i
                                class="fa fa-ban"></i>
                        Disable Slides</a>
                </li>
            @endcan
        @endslot
        @slot('headers')
            <td>Title</td>
            <td>Slug</td>
            <td>Status</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'title' ],
            [ 'data' => 'slug' ],
            [ 'data' => 'status', 'type' => 'status_update' ],
            [ 'data' => 'updated_at' ],
            [ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
            'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection