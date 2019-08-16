@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

<div class="row mt-4 mb-4">

    <div class="col">

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Description</label>

            <div class="col-md-10">

                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('old') !!}</textarea>

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured<br/></label>

            <div class="col-md-10">

                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'gallery', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else

                    <image-uploader
                      input-name="featured_image"
                    ></image-uploader>

                @endif

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Images<br/></label>

            <div class="col-md-10">

                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="true"
                        :uploads="{{ json_encode($model->getUploaderImages('images', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'gallery', 'routeKeyValue' => $model->slug, 'collection' => 'images'])) }}"
                    ></image-uploader>

                @else

                    <image-uploader
                        input-name="images[]"
                        :multiple="true"
                    ></image-uploader>

                @endif

            </div>

        </div>

    </div>

</div>

@push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        CKEDITOR.replace('description', options);

    </script>

@endpush
