@extends('frontend.includes.page')

@section('page-action')
    @can($model::permission('index'))
        <li><a href="{{ $model->actions('backend', 'index', true) }}">Area Of Studies</a></li>
    @endcan
    @can($model->permission('edit'))
        <li><a href="{{ $model->actions('backend', 'edit', true) }}">Edit</a></li>
    @endcan
@endsection

@section('page-body')
    <h2>{{ $model->title }}</h2>
@endsection