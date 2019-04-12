@extends('backend.layouts.app')

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        Hierarchy
    
                        <a href="{{ route('admin.menus.node.create', $model->slug) }}">
    
                            <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
    
                        </a>
    
                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">

                    <div class="dd" id="nestable3">
                        
                        <ol class="dd-list">


                            @foreach ($model->nodes as $key => $item)

                                @php

                                    if (! $key) { $model_name = class_basename($item); }

                                @endphp
                                
                                @include('backend.includes.sortable.list', [

                                    'item' => $item, 

                                    'label' => 'name',
                                    
                                    'edit_route' => route('admin.menus.node.edit', [$model->slug, $item->slug]),
                                    
                                    'delete_route' => route('admin.menus.node.destroy', [$model->slug, $item->slug])
                                
                                ])

                            @endforeach

                        </ol>

                    </div>
                    
                    @isset ($model_name)
                        
                        @include('backend.includes.sortable.form', ['model' => $model_name])
                        
                    @endisset

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => $model->depth])

@endsection