@extends('frontend.includes.page')

@section('page-action')
    @can($MODEL::permission('index'))
        <li><a href="{{ $MODEL->actions('backend', 'index', true) }}">Categories</a></li>
    @endcan
    @can($page::permission('edit'))
        <li><a href="{{ $page->actions('backend', 'edit', true) }}">Edit Page</a></li>
    @endcan
@endsection

@section('page-body')
    @include('frontend.category.partials.breadcrumbs', ['is_index' => true])
    @if(count($models))
        <div class="row">
            @foreach($models as $c => $model)
                <div class="col-sm-4">
                    @include($model::VIEW_FRONTEND_PATH. ".partials.node", ['model' => $model])
                </div>
            @endforeach
        </div>
        {{ $models->links() }}
    @endif
@endsection