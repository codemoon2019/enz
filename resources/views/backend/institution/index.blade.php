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
                       
                            <a class="nav-link tab-item active" id="australia" data-toggle="tab" href="#tab-australia" role="tab" aria-controls="australia" aria-expanded="true">Australia</a>
                       
                        </li>
                       
                        <li class="nav-item">
                       
                            <a class="nav-link tab-item" id="canada" data-toggle="tab" href="#tab-canada" role="tab" aria-controls="canada">Canada</a>
                       
                        </li>
                       
                        <li class="nav-item">
                       
                            <a class="nav-link tab-item" id="new-zealand" data-toggle="tab" href="#tab-new-zealand" role="tab" aria-controls="new-zealand">New Zealand</a>
                       
                        </li>
                    
                    </ul>

                    <div class="tab-content" id="myTabContent">
        
                        @foreach (Country() as $key => $country)
                        
                            <div class="tab-pane fade show {{ !$key ? 'active' : '' }}" id="{{ 'tab-'.$country->slug }}" role="tabpanel" aria-labelledby="{{ $country->slug }}-tab">

                                <h4 class="card-title mb-0" style="padding-top: 10px;">
        
                                    <a href="{{ route('admin.institutions.create', $country->slug) }}">
                
                                        <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
                
                                    </a>
                
                                </h4>

                                <br><br>

                                <div class="dd" style="float: unset;" id="nestable-institution-{{ $country->id }}">
                                    
                                    <ol class="dd-list" >

                                        @php $institutions = $country->institutions; @endphp

                                        @foreach ($institutions as $key => $item)

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

                                @if ($institutions->count())

                                    @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'institution-' . $country->id])
                                    
                                @endif

                            </div>

                            @include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'institution-' . $country->id])

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('after-scripts')
<script>
    $(document).ready(function(){
        var selectedTab = localStorage['selectedTab'] || null
        var tabs = $.map($(".tab-item"), function(n, i){
        return n.id;
        });
        if(selectedTab!=null&&tabs.includes(selectedTab)&&window.location.href==localStorage['location']){
            $('.tab-item').removeClass('active')
            $('.tab-pane').removeClass('show active')
            $('#tab-'+selectedTab).addClass('show active')
            $('#'+selectedTab).addClass('active')
        }
        console.log(window.location.href)
    })
    $('.tab-item').on('click', function(){
        localStorage['selectedTab'] = $(this).attr('id')
        localStorage['location'] = window.location.href
    })
</script>
@endpush