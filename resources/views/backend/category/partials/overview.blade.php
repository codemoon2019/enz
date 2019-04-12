<div class="col">
    <div class="form-group">
        <strong>Description : </strong>
        <p class="pre-line">{{ $model->description }}</p>
    </div>
</div>
@forelse($model->getMedia('images') as $media)
    <img src="{{ $media->getUrl('thumbnail') }}" class="img-responsive">
@empty
    <p>no images</p>
@endforelse