<div class="block news-block lazy" data-src="/img/news.png">

    <section class="news pb40">
    
        <div class="container-fluid px180 relative">
    
            <img class="news-svg" data-src="{{asset('svg/news.svg')}}" alt="">
    
            <h2 class="title fs40 text-white mb80">News and Blogs</h2>   
    
            <div class="row">

                @foreach ($homeNews as $key => $news)
    
                    <div class="col-lg-3 col-md-6 item mb40">
                    
                        <a href="{{ route('frontend.news.show', $news->slug) }}">
                            
                            <div class="card">
        
                                <div class="card-header p0">
        
                                    <img class="img-fluid" data-src="{{ $news->getFirstMediaUrl('featured', 'main') }}" alt="{{$news->title}}">
        
                                </div>
        
                                <div class="card-body news-details">
        
                                    <h3 class="card-title">{{ str_limit($news->title, 40) }}</h3>
        
                                    <p class="card-text">{{ $news->published_at->format('M d, Y') }}</p>
        
                                    <a href="{{ route('frontend.news.show', $news->slug) }}" class="read-more text-blue text-uppercase">Read more</a>
        
                                </div>
        
                            </div>

                        </a>

                    </div>
    
                @endforeach

            </div>
    
            <div class="text-center">
    
                <a href="{{ route('frontend.news.index') }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>
    
        </div>
    
    </section>

</div>

@include('frontend.includes.script.matcheight', ['element' => '.news-details', 'plus_number' => 40])