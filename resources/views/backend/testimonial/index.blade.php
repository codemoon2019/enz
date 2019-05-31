@extends('backend.layouts.app')

@push('after-styles')
<style>
    .dd{
        float: unset;
    }
</style>
@endpush

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        Testimonials
    
                        <a href="{{ route('admin.testimonials.create') }}">
    
                            <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>
    
                        </a>
    
                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                        
                            <a class="nav-link active" id="text-tab" data-toggle="tab" href="#text" role="tab" aria-controls="text" aria-expanded="true">Text Testimonials</a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video">Video Testimonials</a>
                        
                        </li>
                    
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                    
                        <div class="tab-pane fade show active" id="text" role="tabpanel" aria-labelledby="home-tab">
                                
                            <div class="dd" id="nestable-text-testimonial">
                        
                                <ol class="dd-list">

                                    @php

                                        $testimonials = TestimonialText();
                                    
                                    @endphp

                                    @foreach ($testimonials as $key => $item)

                                        @php

                                            if (! $key) { $model = class_basename($item); }
                                        
                                        @endphp
                                        
                                        @include('backend.includes.sortable.list', [

                                            'item' => $item, 

                                            'label' => 'title',
                                            
                                            'edit_route' => route('admin.testimonials.edit', $item->slug),
                                            
                                            'delete_route' => route('admin.testimonials.destroy', $item->slug)
                                        
                                        ])

                                    @endforeach

                                </ol>

                            </div>

                            @if ($testimonials->count())

                                @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'video-testimonial'])
                                
                            @endif

                        </div>
                    
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                
                            <div class="dd" id="nestable-video-testimonial">
                        
                                <ol class="dd-list">

                                    @php

                                        $testimonials = TestimonialVideo();
                                    
                                    @endphp

                                    @foreach ($testimonials as $key => $item)

                                        @php

                                            if (! $key) { $model = class_basename($item); }
                                        
                                        @endphp
                                        
                                        @include('backend.includes.sortable.list', [

                                            'item' => $item, 

                                            'label' => 'title',
                                            
                                            'edit_route' => route('admin.testimonials.edit', $item->slug),
                                            
                                            'delete_route' => route('admin.testimonials.destroy', $item->slug)
                                        
                                        ])

                                    @endforeach

                                </ol>

                            </div>

                            @if ($testimonials->count())

                                @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'video-testimonial'])
                                
                            @endif

                        </div>
                    
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'text-testimonial'])

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'video-testimonial'])

@endsection