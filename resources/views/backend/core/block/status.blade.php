@extends('backend.layouts.app')
@section ('title', 'Block ' . ucfirst($type) . ' List' . ' - Block Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.blocks.table'))
        @slot('form_data', json_encode([ $statusKey => $type ]))
        @slot('table_name', 'block-table')
        @slot('title', 'Block ' . ucfirst($type) . ' List')
        @slot('secondary_title', 'Block Management')
        @slot('links')
            <li class="dropdown-item">
                <a href="{{ route('admin.blocks.index') }}"><i class="fa fa-list"></i> Blocks</a>
            </li>
            <li class="dropdown-item">
                <a href="{{ route('admin.blocks.create') }}" class="text-success"><i class="fa fa-plus"></i> Add
                    Block</a>
            </li>
            <li class="dropdown-item">
                <a href="{{ route('admin.blocks.status', 'enable') }}"><i class="fa fa-check"></i> Enabled Blocks</a>
            </li>
            <li class="dropdown-item">
                <a href="{{ route('admin.blocks.status', 'disable') }}"><i class="fa fa-ban"></i> Disable Blocks</a>
            </li>
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
            'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection