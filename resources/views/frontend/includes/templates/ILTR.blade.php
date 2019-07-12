@php $image_area = $content->property->image_area; @endphp

@switch($image_area)
    
    @case(3)
    
    <div class="container-fluid mb150 pr83 text-justify">

        <div class="row">
        
            <div class="col-sm-4">
        
                <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-sm-8 align-self-center">
                
                <div class="basic pl10p">

                    {!! $content->body !!}
                
                </div>

            </div>

        </div>

    </div>

    @break
    
    @case(6)

    <div class="container-fluid mb150 pr83 text-justify">

        <div class="row">
        
            <div class="col-sm-6">
        
                <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-sm-6 align-self-center">
                
                <div class="basic pl10p">

                    {!! $content->body !!}
                
                </div>

            </div>

        </div>

    </div>


    @break

    @default

    <div class="container-fluid mb150 pr83 text-justify">

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

@endswitch
