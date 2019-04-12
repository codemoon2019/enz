@php $image_area = $content->property->image_area; @endphp

@if ($image_area == 9)

    <div class="container-fluid mb150 pr83">

        <div class="row">
        
            <div class="col-sm-9">
        
                <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-sm-3 align-self-center">
                
                <div class="basic pl10p">

                    {!! $content->body !!}
                
                </div>

            </div>

        </div>

    </div>

@endif