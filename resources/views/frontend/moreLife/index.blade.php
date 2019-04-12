@extends('frontend.layouts.app')

@section('page_class', 'page-life page-template-more hasPageScroll')

@section('content')

@include('frontend.includes.templates.index', ['template_type' => 'more_life'])

@endsection