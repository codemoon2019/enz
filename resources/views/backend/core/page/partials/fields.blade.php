@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">{{ __('core_page.fields.title') }} <i
                        class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('title', old('title'))
                    ->class('form-control ' . ($errors->has('title') ? 'is-invalid' : '' ))
                    ->placeholder( __('core_page.fields.placeholder.title'))
                    ->autofocus(true) !!}
            </div>
        </div>
    
        <div class="form-group row" style="display: none;">
            <label class="col-md-2 form-control-label">{{ __('core_page.fields.template') }} <i class="text-danger">*</i></label>
            <div class="col-md-10">
                <select name="template" class="form-control">
                    <option value="default">Default</option>
                </select>
            </div>
        </div>

        {{-- @if( ! isset($model) || (isset($model) && is_null($model->pageable_type)) )
            <div class="form-group row">
                <label class="col-md-2 form-control-label">{{ __('core_page.fields.template') }} <i class="text-danger">*</i></label>
                <div class="col-md-10">
                    {!!
                        html()->select(
                            'template',
                            template_blades('page'),
                            (isset($model) ? $model->template : null) ?? old('template') ?? 'default'
                        )
                        ->class('form-control ' . ($errors->has('template') ? 'is-invalid' : '' ))
                        ->placeholder(__('core_page.fields.placeholder.template'))
                    !!}

                </div>
            </div>
        @endif --}}

        @include('backend.includes.fields.domain')

{{--         <div class="form-group row">
            <label class="col-md-2 form-control-label">Description<br/></label>
            <div class="col-md-10">
                <textarea name="description" id="description" class="form-control">{{ isset($model) ? $model->description : old('description') }}</textarea>
            </div>
        </div>
 --}}
        {{-- <div class="form-group row">
            <label class="col-md-2 form-control-label">Banner<br/></label>
            <div class="col-md-10">
                @if(isset($model))
                    <image-uploader
                        :multiple="true"
                        :api-mode="true"
                        :uploads="{{ json_encode($model->getUploaderImages('banner', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'page', 'routeKeyValue' => $model->slug, 'collection' => 'banner'])) }}"
                    ></image-uploader>
                @else
                    <image-uploader></image-uploader>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">Featured<br/></label>
            <div class="col-md-10">
                @if(isset($model))
                    <image-uploader
                        :multiple="true"
                        :api-mode="true"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'page', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>
                @else
                    <image-uploader></image-uploader>
                @endif
            </div>
        </div> --}}

    </div>
</div>

@push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        CKEDITOR.replace('description', options);
    
    </script>

@endpush