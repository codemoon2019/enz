<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">{{ __('core_category.fields.title') }} <i
                        class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('title', old('title'))
                    ->class('form-control ' . ($errors->has('title') ? 'is-invalid' : '' ))
                    ->placeholder(__('core_category.fields.placeholder.title'))
                    ->autofocus(true) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">{{ __('core_category.fields.parent') }}</label>
            <div class="col-md-10">
                {!!
                    html()->select(
                        'parent_id',
                        app(App\Repositories\Category\CategoryRepository::class)->inForm(isset($model) ? $model:null),
                        isset($model) ? $model->parent_id : old('parent_id')
                    )
                    ->class('form-control ' . ($errors->has('parent_id') ? 'is-invalid' : '' ))
                    ->placeholder(__('core_category.fields.placeholder.parent'))
                !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">{{ __('core_category.fields.description') }} <i
                        class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->textarea('description', isset($model) ? $model->description :  old('description'))
                    ->class('form-control ' . ($errors->has('description') ? 'is-invalid' : '' ))
                    ->placeholder(__('core_category.fields.placeholder.description'))
                    ->attribute('id', 'form-description')
                    ->attribute('rows', 5)
                    ->autofocus(true) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Images<br/></label>
            <div class="col-md-10">
                @if(isset($model))
                    <image-uploader
                            :multiple="true"
                            :api-mode="true"
                            :uploads="{{ json_encode($model->getUploaderImages()) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'category', 'routeKeyValue' => $model->slug, 'conversion' => 'main_banner'])) }}"
                    ></image-uploader>
                @else
                    <image-uploader></image-uploader>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">{{ __('core_category.fields.status') }}<br/>
                <small>{{ __('core_category.status_desc') }}</small>
            </label>
            @include('backend.includes.widgets.status')
        </div>
    </div>
</div>
