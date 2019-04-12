@extends('backend.layouts.app')
@section ('title', 'Block Management | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Block\Block')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.blocks.table'))
        @slot('form_data', json_encode([ 'blockable_type' => null, 'blockable_id' => null ]))
        @slot('table_name', 'block-table')
        @slot('title', 'Block List')
        @slot('secondary_title', 'Block Management')
        @slot('links')
            @can($MODEL->permission('index'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.blocks.index') }}"><i class="fa fa-list"></i> Blocks</a>
                </li>
            @endcan
            @can($MODEL->permission('create'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.blocks.create') }}" class="text-success"><i class="fa fa-plus"></i> Add
                        Block</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.blocks.status', 'enable') }}"><i class="fa fa-check"></i> Enabled
                        Blocks</a>
                </li>
            @endcan
            @can($MODEL->permission('change-status'))
                <li class="dropdown-item">
                    <a href="{{ route('admin.blocks.status', 'disable') }}" class="text-danger"><i
                                class="fa fa-ban"></i>
                        Disable Blocks</a>
                </li>
            @endcan
        @endslot
        @slot('headers')
            <td>Title</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'title' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))
    @endcomponent
@endsection

@section('instruction')
    This is the list of all blocks available on your website. <br/>
    You can change the status of a block by select a status on the table.<br/>
@endsection