<div class="col">
    <div class="form-group">
        <strong>{{ __('core_page.fields.template') }} : </strong> {{ ucfirst($model->template) }}
    </div>
    <div class="form-group">
        <strong>{{ __('core_page.fields.content') }} : </strong>
        <p>{!! $model->content ?? 'N/A' !!}</p>
        @forelse($model->getMedia('images') as $media)
            <img src="{{ $media->getUrl('thumbnail') }}" class="img-responsive">
        @empty
            <p>no images</p>
        @endforelse
    </div>
    {{-- @include('backend.core.meta.show', ['meta' => $model->metable]) --}}
    @include('backend.includes.widgets.tab-actions', [
        'name' => 'More Info',
       'links' => [
           [
               'name' => 'Meta',
               'template' => 'backend.core.meta.show',
               'args' => ['meta' => $model->metable ]
           ]
       ]
   ])
</div>