{{-- @php $image_area = $content->property->image_area; @endphp

@if ($image_area == 6)

    <div class="mw-1200 mx-auto mb-150">
        <div class="container">

            <div class="row">
                
                <div class="col-sm-6">
                
                    <div class="basic">
                        
                        {!! $content->body !!}
    
                    </div>
                
                </div>
                
                <div class="col-sm-6">
                
                    <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid w-100" alt="">
                
                </div>
            
            </div>
        </div>

    
    </div>

@endif --}}