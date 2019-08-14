<div class="block events-block lazy">

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
        
        {{-- <img  data-src="{{asset('svg/plant.svg')}}" alt="" > --}}
        <div class="plant" data-aos="fade-right">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="114.427" height="364.64" viewBox="0 0 114.427 364.64">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#3bcd8f"/>
                    <stop offset="0.277" stop-color="#3bcd8f"/>
                    <stop offset="0.5" stop-color="#25ac73"/>
                    <stop offset="0.821" stop-color="#0a834f"/>
                    <stop offset="0.986" stop-color="#007442"/>
                    <stop offset="1" stop-color="#007442"/>
                  </linearGradient>
                  <linearGradient id="linear-gradient-2" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0.092" stop-color="#ffbd8a"/>
                    <stop offset="0.844" stop-color="#f09a59"/>
                  </linearGradient>
                </defs>
                <g id="Group_419" data-name="Group 419" transform="translate(-1066.19 -1873.125)">
                  <path id="Path_1" data-name="Path 1" d="M1074.121,1898.821s-23.813,105.364,13.893,176.926l37.706,71.568S1135.64,1968.4,1074.121,1898.821Z" transform="translate(0 0.312)" stroke="#000" stroke-width="1" fill="url(#linear-gradient)"/>
                  <path id="Path_2" data-name="Path 2" d="M1075.641,2171.115c2.287,12.92,5.223,25.953,11.606,37.409s16.7,21.3,29.43,24.387c5.771,1.4,11.782,1.38,17.723,1.22,6.51-.177,13.319-.586,18.936-3.9,7.319-4.321,11.154-12.654,14.127-20.625a241.09,241.09,0,0,0,11.4-41.6c1.468-8.178,2.415-17.045-1.4-24.43-5.165-10-17.266-14.024-28.356-15.835-18.436-3.011-43.818-4.55-61.477,2.968C1072.21,2137.276,1073.141,2157.005,1075.641,2171.115Z" transform="translate(0.092 3.083)" fill="#fff" stroke="#000" stroke-width="1"/>
                  <path id="Path_3" data-name="Path 3" d="M1117.284,2144.815c14.627.858,30.478-1.385,39.685-6.356,1.846-.991,3.484-2.27,2.611-3.485-1.027-1.438-4.926-2.03-8.319-2.381-17.585-1.817-37.057-2.637-54.27.288C1071.775,2137.163,1103.9,2144.031,1117.284,2144.815Z" transform="translate(0.256 3.152)" stroke="#000" stroke-width="1" fill="url(#linear-gradient-2)"/>
                  <path id="Path_4" data-name="Path 4" d="M1109.352,1873.291s-11.909,200.78,15.877,274.336C1125.229,2147.627,1143.09,1968.713,1109.352,1873.291Z" transform="translate(0.491 0)" stroke="#000" stroke-width="1" fill="url(#linear-gradient)"/>
                  <path id="Path_5" data-name="Path 5" d="M1121.64,2145.626h6.447c9.484-39.753,37.861-168.5,22.861-228.593,0,0-47.626,168.977-35.722,206.747C1118.134,2133.686,1120.187,2140.676,1121.64,2145.626Z" transform="translate(0.57 0.535)" stroke="#000" stroke-width="1" fill="url(#linear-gradient)"/>
                </g>
            </svg>
        </div>
          
    </div>

</div>

@include('frontend.includes.script.matcheight', ['element' => '.event-details', 'plus_number' => 0])
