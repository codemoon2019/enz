<div class="block news-block">

    <section class="testimonials mb20p">
    
        <div class="container-fluid px180">
    
            <h2 class="title fs40 text-blue mb30">Student Testimonials</h2>   
    
            <div class="pull-right">
    
                <button class="btn left myarrow">
    
                    <img class="" src="{{asset('svg/arrow.svg')}}" alt="">
    
                </button>
    
                <button class="btn right myarrow">
    
                    <img class="" src="{{asset('svg/arrow.svg')}}" alt="">
    
                </button>
    
            </div>
    
            <div class="clearfix"></div>
    
            <div class="slick-slider">
    
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/siIep9LHtNM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/b7ffmtnuSGM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/_b_YVrex0yI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/siIep9LHtNM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/siIep9LHtNM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    
    </section>

    <section class="news pb40">
    
        <div class="container-fluid px180 relative">
    
            <img class="news-svg" src="{{asset('svg/news.svg')}}" alt="">
    
            <h2 class="title fs40 text-white mb80">News</h2>   
    
            <div class="row">

                @foreach (News()->slice(0, 4) as $key => $news)
    
                    <div class="col-sm-3 item mb40">
    
                        <div class="card">
    
                            <div class="card-header p0">
    
                                <img class="img-fluid" src="{{ $news->getFirstMediaUrl('featured', 'main') }}" alt="">
    
                            </div>
    
                            <div class="card-body">
    
                                <h3 class="card-title">{{ $news->title }}</h3>
    
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