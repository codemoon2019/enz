@extends('backend.layouts.app')

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        News and Blogs
    
                        <a href="{{ route('admin.news.create') }}">
    
                            <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
    
                        </a>
    
                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">
                    
                    <ol style="list-style: none;">    

                        <li>

                            <b style="margin-right:90px;">Title</b>
                            
                            <b style="position: absolute; right: 390px;">Migration</b>
                            
                            <b style="position: absolute; right: 120px;">Status</b>
                            
                        </li>
                    
                    </ol>

                    <div class="dd" id="nestable-news">
                        
                        <ol class="dd-list">

                            @php

                                $news = News();
                            
                            @endphp

                            @foreach ($news as $key => $item)

                                @php

                                    if (! $key) { $model = class_basename($item); }
                                
                                @endphp
                                
                                @include('backend.includes.sortable.list', [

                                    'item' => $item, 

                                    'label' => 'title',
                                    
                                    'edit_route' => route('admin.news.edit', $item->slug),
                                    
                                    'delete_route' => route('admin.news.destroy', $item->slug),

                                    'other_status' => true
                                
                                ])

                            @endforeach

                        </ol>

                    </div>

                    @if ($news->count())

                        @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'news'])
                        
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'news'])

@endsection