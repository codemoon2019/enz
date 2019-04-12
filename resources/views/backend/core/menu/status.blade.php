@extends('backend.layouts.app')
@section ('title', 'Menu ' . ucfirst($type) . ' List' . ' - Menu Management | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Menu\Menu')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.menus.table'))
        @slot('form_data', json_encode([ $statusKey => $type ]))
        @slot('table_name', 'menu-table')
        @slot('title', 'Menu ' . ucfirst($type) . ' List')
        @slot('secondary_title', 'Menu Management')
        @slot('links')
            @can($MODEL->permission('index'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.menus.index') }}"><i class="fa fa-list"></i> Menus</a>
                </li>
            @endcan
            @can($MODEL->permission('create'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.menus.create') }}" class="text-success"><i class="fa fa-plus"></i> Add Menu</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.menus.status', 'enable') }}"><i class="fa fa-check"></i> Enabled Menus</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.menus.status', 'disable') }}" class="text-danger"><i class="fa fa-ban"></i>
                        Disable Menus</a>
                </li>
            @endcan
        @endslot
        @slot('headers')
            <td>Name</td>
            <td>Status</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'name' ],
            [ 'data' => 'status', 'type' => 'status_update' ],
            [ 'data' => 'updated_at' ],
            [ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
            'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection