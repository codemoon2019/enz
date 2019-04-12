<div class="block investment-block mb150">

    <div class="row">

        @foreach (Investment()->slice(0, 2) as $key => $investment)
            
            <div class="col-sm-6 left-content">
        
                <div class="img-holder relative">
        
                    <img data-src="{{ $investment->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
        
                    <div class="overlay"></div>
        
                    <h2 class="title text-white">{{ $investment->title }}</h2>
        
                </div>
       
                <div class="details">
       
                    <div class="basic text-black w-70 mb20">

                        @if (strlen($investment->description) > 150)

                            {!! substr($investment->description,0,150) !!} ...
                        
                        @else
                        
                            {!! $investment->description !!}
                        
                        @endif

                    </div>
                    
                    <a class="basic btn btngreen-custom small text-uppercase" href="#">Read more</a>
                
                </div>

            </div>

        @endforeach

    </div>

</div>