@extends('frontend.layouts.app')

@section('page_class', "page page-news")

@section('content')
    
    <div class="container pt50">

        <h1 class="title fs35">{{ $model->title }}</h1>
        
        <div class="basic text-black text-justify mb30">
            
            {!!  $model->description !!}

        </div>

        @include('frontend.includes.templates.index')

    </div>

@endsection