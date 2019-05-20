<div class="panel panel-default">
    <div class="ql-container">
        @include('frontend.includes.widgets.quick-link', ['model' => $model])
        <div class="panel-heading">{{ $model->title }}</div>
        <div class="panel-body pre-line">{!! closetags(str_limit($model->content, 100, '...')) !!}</div>
        <div class="panel-footer">
            <a href="{{ $model->actions('frontend', 'show', true) }}" class="btn btn-primary ">
                View More
            </a>
        </div>
    </div>
</div>