@extends('frontend.layouts.app')

@section('page_class', "page page-awards page-basic")

@section('content')

<div class="container-fluid px180 pt50">

    <h1 class="title fs40 text-center">Awards</h1>

    <div class="basic text-black text-center">
        
        {!! $page->description !!}

    </div>

</div>

<div class="block why-choose-block">

    <div class="container-fluid px475">

        <div class="row">
    
            @foreach ($models as $award)

                <div class="col-sm-4 item text-center mb30">

                    <div class="svg-holder mb20 mx-auto">

                        <img alt="" class="img-fluid" src="{{ $award->getFirstMediaUrl('featured') }}" style="">

                    </div>
                    
                    <h3 class="title basic text-black">{{ $award->title }}</h3>

                    <div class="basic">
                        
                        {!! $award->description !!}

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection