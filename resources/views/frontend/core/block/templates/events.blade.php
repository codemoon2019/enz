<div class="block events-block">

    <div class="container-fluid px180">
    
        <h2 class="title fs40 text-white mb80">Events</h2>   
    
        <div class="row">
            
            @foreach ($homeEvents as $key => $event)

                @php
                   
                    switch ($key) {

                        case 0: $bgColor = 'linear-gradient-yellow'; break;

                        case 1: $bgColor = 'linear-gradient-red'; break;
                        
                        default: $bgColor = 'linear-gradient-orange'; break;
                    }
                
                @endphp

                <div class="col-sm-4 item mb30" data-aos="fade-up">

                    <div class="d-flex event-details">
                    
                        <div class="col-sm-4 date text-center py38 text-white {{ $bgColor }}">
                    
                            <span class="num">{{ $event->event_date->format('d') }}</span>
                    
                            <span class="month">{{ $event->event_date->format('M') }}</span>
                    
                        </div>
                    
                        <div class="col-sm-8 details">
                    
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
