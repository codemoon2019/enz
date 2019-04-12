@php
    
    $news = News();

@endphp

<div class="container-fluid px83">

    <div class="block blog-block mb150">
    
        <h2 class="title text-black text-capitalize pull-left">Blog and News</h2>
    
        <div class="text-right pr35">
    
            <a class="basic btn btngreen-custom small text-uppercase mb30" href="{{ route('frontend.news.index') }}">View all</a>
    
        </div>
    
        <div class="clearfix"></div>
    
        <div class="row">
    
            <div class="col-sm-8 left-content featured item">

                <div class="wrapper relative">
                
                    <div class="img-holder relative mb30">
                        
                        <img data-src="{{ $news[0]->getFirstMediaUrl('featured', 'large') }}" class="img-fluid" alt="">
                
                    </div>
                
                    <div class="hoverable">
                
                        <p class="blog-date text-uppercase">{{ $news[0]->published }}</p>
                
                        <h3 class="blog-title text-black text-capitalize">{{ $news[0]->title }}</h3>
                
                        <div class="tohide">
                            
                            <div class="blog-intro basic black-text mb30">
                            
                                {!! $news[0]->description !!}

                            </div>
                        
                            <a class="basic btn btngreen-custom small text-uppercase mb30" href="{{ route('frontend.news.show', $news[0]->slug) }}">Read more</a>

                        </div>

                    </div>
                
                </div>
            
            </div>
    
            <div class="col-sm-4 right-content">

                <div class="row">

                    @foreach ($news->slice(1, 2) as $key => $news)

                        <div class="col-sm-12 item">
                    
                            <div class="wrapper relative">
                    
                                <div class="img-holder relative">
                    
                                    <img data-src="{{ $news->getFirstMediaUrl('featured', 'small') }}" class="img-fluid" alt="">
                    
                                </div>
                    
                                <div class="hoverable">
                    
                                    <p class="blog-date text-uppercase">{{ $news->published }}</p>
                    
                                    <h3 class="blog-title text-black text-capitalize">{{ $news->title }}</h3>
                    
                                    <div class="tohide">
                    
                                        <div class="blog-intro basic black-text mb30">
                
                                            {!! closetags(str_limit($news->description, 55, '...')) !!}

                                        </div>
                    
                                        <a class="basic btn btngreen-custom small text-uppercase mb30" href="{{ route('frontend.news.show', $news->slug) }}">Read more</a>
                    
                                    </div>
                    
                                </div>
                    
                            </div>
                    
                        </div>

                    @endforeach
                    
                </div>

            </div>

        </div>

    </div>

</div>