<div class="col">
    @if(! is_null($model->content))
        <div class="form-group">
            <strong>Content : </strong>
            <p>{!! $model->content !!}</p>
        </div>
    @endif
    @if($model->getMedia($model->collection_name)->count())
        <div class="clearfix relative">
            @foreach($model->getMedia($model->collection_name) as $img)
                <img src="{{ $img->getUrl('thumbnail') }}" class="img-responsive img-size-100-100"/>
            @endforeach
        </div>
    @endif
</div>