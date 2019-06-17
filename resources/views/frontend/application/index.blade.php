@extends('frontend.includes.page')

@section('page-action')
    @can($Model::permission('index'))
        <li><a href="{{ $Model->actions('backend', 'index', true) }}">Applications</a></li>
    @endcan
    @can($page::permission('edit'))
        <li><a href="{{ $page->actions('backend', 'edit', true) }}">Edit Page</a></li>
    @endcan
@endsection

@section('page-body')
    @if(count($models))
        <div class="row">
            @foreach($models as $a => $model)
                <div class="col-sm-3">
                    @include($model::VIEW_FRONTEND_PATH. ".partials.node", ['model' => $model])
                </div>
            @endforeach
        </div>
    @endif
    {{ $models->links() }}
@endsection