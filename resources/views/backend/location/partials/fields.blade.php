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

            <label class="col-md-2 form-control-label">Address</label>

            <div class="col-md-10">

                <textarea name="address" id="address" class="form-control">{!! isset($model) ? $model->address : old('old') !!}</textarea>

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Latitute <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="lat" class="form-control" value="{{ isset($model) ? $model->lat : old('lat') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Longitude <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="long" class="form-control" value="{{ isset($model) ? $model->long : old('long') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Heading <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="heading" class="form-control" value="{{ isset($model) ? $model->heading : old('heading') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Pitch <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="pitch" class="form-control" value="{{ isset($model) ? $model->pitch : old('pitch') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Contact</label>

            <div class="col-md-10">

                <textarea name="contact" id="contact" class="form-control">{!! isset($model) ? $model->contact : old('old') !!}</textarea>

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured Image<br/></label>

            <div class="col-md-10">

                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'location', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else

                    <image-uploader
                        input-name="featured_image"
                    ></image-uploader>

                @endif

            </div>

        </div>

    </div>

</div>

@push('after-scripts')

    @include('backend.includes.ckeditor')

    <script>

        CKEDITOR.replace('contact', options);

    </script>

@endpush
