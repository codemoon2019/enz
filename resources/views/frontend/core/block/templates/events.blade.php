<div class="block events-block">

    <div class="container-fluid px180">
    
        <h2 class="title fs40 text-white mb30">Events</h2>   
    
        <div class="row">
            
            @foreach (Events()->slice(0, 3) as $key => $event)

                @php
                   
                    switch ($key) {

                        case 0: $bgColor = 'linear-gradient-yellow'; break;

                        case 1: $bgColor = 'linear-gradient-red'; break;
                        
                        default: $bgColor = 'linear-gradient-orange'; break;
                    }
                
                @endphp

                <div class="col-sm-4 item mb30" data-aos="fade-up">

                    <div class="d-flex">
                    
                        <div class="col-sm-4 date text-center py38 text-white {{ $bgColor }}">
                    
                            <span class="num">{{ $event->event_date->format('d') }}</span>
                    
                            <span class="month">{{ $event->event_date->format('M') }}</span>
                    
                        </div>
                    
                        <div class="col-sm-8 details">
                    
                            <p class="basic">{{ $event->title }}</p>
                    
                            <a href="{{ route('frontend.events.show', $event->slug) }}" class="read-more text-blue text-uppercase">Read more</a>
                    
                        </div>
                    
                    </div>

                </div>

            @endforeach

        </div>  

        <div class="text-center">
        
            <a href="{{ route('frontend.events.index') }}" class="btn btnview-more text-uppercase">View more</a>
        
        </div>
        
        <img class="plant" src="{{asset('svg/plant.svg')}}" alt="">
    
    </div>

</div>