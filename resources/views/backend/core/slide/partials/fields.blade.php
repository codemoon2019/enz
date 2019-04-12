<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Name <i class="text-danger">*</i></label>
            <div class="col-md-10">
                {!! html()->text('title', isset($model) ? $model->name : old('title'))
                    ->class('form-control ' . ($errors->has('title') ? 'is-invalid' : '' ))
                    ->placeholder('Enter title')
                    ->autofocus() !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Description</label>
            <div class="col-md-10">
                {!! html()->textarea('description', isset($model) ? $model->description : old('description'))
                    ->class('form-control form-ckeditor' . ($errors->has('description') ? 'is-invalid' : '' ))
                    ->placeholder('Enter description')
                    ->attribute('id', 'form-description')
                    ->attribute('rows', 5)
                     !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Images<br/></label>
            <div class="col-md-10">
                @if(isset($model))
                    <image-uploader
                        :multiple="true"
                        :api-mode="true"
                        :uploads="{{ json_encode($model->getUploaderImages('banner', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'slide', 'routeKeyValue' => $model->slug, 'conversion' => 'thumbnail'])) }}"
                    ></image-uploader>
                @else
                    <image-uploader></image-uploader>
                @endif
            </div>
        </div>
{{--         <div class="form-group row">
            <label class="col-md-2 form-control-label">Status<br/>
                <small>This menu will not be visible on the system if turned off</small>
            </label>
            @include('backend.includes.widgets.status')
        </div> --}}
    </div>
</div>
