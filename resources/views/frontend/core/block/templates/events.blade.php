<div class="block events-block lazy" data-src="/img/events.png">

    <div class="container-fluid px180">
    
        <h2 class="title fs40 text-white mb80">Events</h2>   
    
        <div class="row justify-content-center">
            
            @foreach ($homeEvents as $key => $event)

                @php
                   
                    switch ($key) {

                        case 0: $bgColor = 'linear-gradient-yellow'; break;

                        case 1: $bgColor = 'linear-gradient-red'; break;
                        
                        default: $bgColor = 'linear-gradient-orange'; break;
                    }
                
                @endphp

                <div class="col-lg-4 col-sm-6 item mb30" data-aos="fade-left">

                    <div class="d-flex event-details h-100">
                    
                        <div class="col-lg-4 col-md-6 date text-center py38 text-white {{ $bgColor }}">
                    
                            <span class="num">{{ $event->event_date->format('d') }}</span>
                    
                            <span class="month">{{ $event->event_date->format('M') }}</span>
                    
                        </div>
                    
                        <div class="col-lg-8 col-md-6 details">
                    
                            <p class="basic">{{ str_limit($event->title, 30) }}</p>
                    
                            <a href="{{ route('frontend.events.show', $event->slug) }}" class="read-more text-blue text-uppercase">Read more</a>
                    
                        </div>
                    
                    </div>

                </div>

            @endforeach

        </div>  

        <div class="text-center">
        
            <a href="{{ route('frontend.events.index') }}" class="btn btnview-more text-uppercase">View more</a>
        
        </div>
        
        <img class="plant" data-src="{{asset('svg/plant.svg')}}" alt="" data-aos="fade-right">
    
    </div>

</div>

@include('frontend.includes.script.matcheight', ['element' => '.event-details', 'plus_number' => 0])
