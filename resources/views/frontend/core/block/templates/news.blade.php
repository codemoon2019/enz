<div class="block news-block">

    <section class="news pb40">
    
        <div class="container-fluid px180 relative">
    
            <img class="news-svg" data-src="{{asset('svg/news.svg')}}" alt="">
    
            <h2 class="title fs40 text-white mb80">News</h2>   
    
            <div class="row">

                @foreach ($homeNews as $key => $news)
    
                    <div class="col-sm-3 item mb40">
    
                        <div class="card">
    
                            <div class="card-header p0">
    
                                <img class="img-fluid" data-src="{{ $news->getFirstMediaUrl('featured', 'main') }}" alt="">
    
                            </div>
    
                            <div class="card-body">
    
                                <h3 class="card-title">{{ str_limit($news->title, 60) }}</h3>
    
                                <p class="card-text">{{ $news->published_at->format('M d, Y') }}</p>
    
                                <a href="{{ route('frontend.news.show', $news->slug) }}" class="read-more text-blue text-uppercase">Read more</a>
    
                            </div>
    
                        </div>
    
                    </div>
    
                @endforeach

            </div>
    
            <div class="text-center">
    
                <a href="#" class="btn btnview-more text-uppercase">View more</a>
    
            </div>
    
        </div>
    
    </section>

</div>