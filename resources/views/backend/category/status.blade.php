@extends('backend.layouts.app')
@section ('title', 'Category ' . ucfirst($type) . ' List' . ' - Category Management | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Category\Category')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.category.table'))
        @slot('form_data', json_encode([ $statusKey => $type ]))
        @slot('table_name', 'category-table')
        @slot('title', 'Category ' . ucfirst($type) . ' List')
        @slot('secondary_title', 'Category Management')
        @slot('links')
            @can($MODEL->permission('index'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.category.index') }}"><i class="fa fa-list"></i> Category</a>
                </li>
            @endcan
            @can($MODEL->permission('create'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.category.create') }}" class="text-success"><i class="fa fa-plus"></i> Add
                        Category</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.category.status', 'disable') }}" class="text-danger"><i
                                class="fa fa-ban"></i> Disable Category</a>
                </li>
            @endcan
        @endslot
        @slot('headers')
            <td>Title</td>
            <td>Status</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'title' ],
            [ 'data' => 'status', 'type' => 'status_update' ],
            [ 'data' => 'updated_at' ],
            [ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
            'order' => [ [2, 'desc'] ] 
        ]))

    @endcomponent
@endsection