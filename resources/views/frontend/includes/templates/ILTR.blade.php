<div class="mw-1200 mx-auto mb50">

    <div class="container">

        <div class="row">
            
            <div class="col-sm-6">
            
                <img data-src="{{ asset($content->getFirstMediaUrl('images')) }}" class="img-fluid w-100" alt="">
            
            </div>
        
            <div class="col-sm-6 align-self-center" style="padding: 0px 15px 0px 0px;">
            
                <div class="basic text-justify">
                    
                    {!! $content->body !!}

                </div>
            
            </div>
            
        </div>
    </div>

</div>
