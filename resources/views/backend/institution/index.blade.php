@extends('backend.layouts.app')

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        Institutions

                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="australia-tab" data-toggle="tab" href="#australia" role="tab" aria-controls="australia" aria-expanded="true">Australia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="canada-tab" data-toggle="tab" href="#canada" role="tab" aria-controls="canada">Canada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-zealand-tab" data-toggle="tab" href="#new-zealand" role="tab" aria-controls="new-zealand">New Zealand</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
    
                    @foreach (Country() as $key => $country)
                    
                        <div class="tab-pane fade show {{ !$key ? 'active' : '' }}" id="{{ $country->slug }}" role="tabpanel" aria-labelledby="{{ $country->slug }}-tab">

                            <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                                <a href="{{ route('admin.institutions.create', $country->slug) }}">
            
                                    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
            
                                </a>
            
                            </h4>

                            <br><br>

                            <div class="dd" style="float: unset;" id="nestable-institution">
                                
                                <ol class="dd-list" >

                                    @foreach ($country->institutions as $key => $item)

                                        @php

                                            if (! $key) { $model = class_basename($item); }
                                        
                                        @endphp
                                        
                                        @include('backend.includes.sortable.list', [

                                            'item' => $item, 

                                            'label' => 'title',
                                            
                                            'edit_route' => route('admin.institutions.edit', [$item->slug, $country->slug]),

                                            'show_route' => route('admin.institutions.show', $item->slug),
                                            
                                            'delete_route' => route('admin.institutions.destroy', $item->slug)
                                        
                                        ])

                                    @endforeach

                                </ol>

                            </div>


                        </div>

                    @endforeach

                </div>








{{--                     <div class="dd" id="nestable-institution">
                        
                        <ol class="dd-list">

                            @php

                                $institutions = Institution();
                            
                            @endphp

                            @foreach ($institutions as $key => $item)

                                @php

                                    if (! $key) { $model = class_basename($item); }
                                
                                @endphp
                                
                                @include('backend.includes.sortable.list', [

                                    'item' => $item, 

                                    'label' => 'title',
                                    
                                    'edit_route' => route('admin.institutions.edit', $item->slug),

                                    'show_route' => route('admin.institutions.show', $item->slug),
                                    
                                    'delete_route' => route('admin.institutions.destroy', $item->slug)
                                
                                ])

                            @endforeach

                        </ol>

                    </div>

                    @if ($institutions->count())

                        @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'institution'])
                        
                    @endif --}}

                </div>

            </div>

        </div>

    </div>

</div>

{{-- @include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'institution']) --}}

@endsection