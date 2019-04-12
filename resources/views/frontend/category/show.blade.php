@extends('frontend.includes.page')

@section('page-action')
    @can($model->permission('index'))
        <li><a href="{{ $model->actions('backend', 'index', true) }}">Categories</a></li>
    @endcan
    @can($model->permission('edit'))
        <li><a href="{{ $model->actions('backend', 'edit', true) }}">Edit Page</a></li>
    @endcan
@endsection

@section('page-body')
    @include('frontend.category.partials.breadcrumbs')
    <p>{!! $model->description !!}</p>
    <hr/>
    @if(count($models))
        <div class="row">
            @foreach($models as $c => $model)
                <div class="col-sm-4">
                    @include($model::VIEW_FRONTEND_PATH. ".partials.node", ['model' => $model])
                </div>
            @endforeach
        </div>
    @endif
@endsection