@extends('backend.layouts.app')

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        Why Choose ENZ?
    
                        <a href="{{ route('admin.whies.create') }}">
    
                            <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
    
                        </a>
    
                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">

                    <div class="dd" id="nestable-why">
                        
                        <ol class="dd-list">

                            @php

                                $whies = Whies();
                            
                            @endphp

                            @foreach ($whies as $key => $item)

                                @php

                                    if (! $key) { $model = class_basename($item); }
                                
                                @endphp
                                
                                @include('backend.includes.sortable.list', [

                                    'item' => $item, 

                                    'label' => 'title',
                                    
                                    'edit_route' => route('admin.whies.edit', $item->slug),
                                    
                                    'delete_route' => route('admin.whies.destroy', $item->slug)
                                
                                ])

                            @endforeach

                        </ol>

                    </div>

                    @if ($whies->count())

                        @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'why'])
                        
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'why'])

@endsection