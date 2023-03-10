@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

<div class="row mt-4 mb-4">

    <div class="col">

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Name <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="title" class="form-control" value="{{ isset($model) ? $model->title : old('title') }}">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Position <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="position" id="position" class="form-control" value="{{ isset($model) ? $model->position : old('position') }}">

            </div>

        </div>


        <div class="form-group row">

            <label class="col-md-2 form-control-label">Email <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="email" id="email" class="form-control" value="{{ isset($model) ? $model->email : old('email') }}">

            </div>

        </div>


        <div class="form-group row">

            <label class="col-md-2 form-control-label">Contact <i class="text-danger">*</i></label>

            <div class="col-md-10">

                <input type="text" name="contact" id="contact" class="form-control" value="{{ isset($model) ? $model->contact : old('contact') }}">

            </div>

        </div>


        <div class="form-group row">

            <label class="col-md-2 form-control-label">Description</label>

            <div class="col-md-10">

                <textarea name="description" id="description" class="form-control">{!! isset($model) ? $model->description : old('description') !!}</textarea>

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Featured Image <i class="text-danger">*</i><br/></label>

            <div class="col-md-10">

                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('featured', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'our-team', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
                    ></image-uploader>

                @else

                    <image-uploader
                        input-name="featured_image"
                    ></image-uploader>

                @endif

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label">Badge</label>

            <div class="col-md-10">

                @if(isset($model))

                    <image-uploader
                        :api-mode="true"
                        :multiple="false"
                        :uploads="{{ json_encode($model->getUploaderImages('other', 'thumbnail')) }}"
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'our-team', 'routeKeyValue' => $model->slug, 'collection' => 'other'])) }}"
                    ></image-uploader>

                @else

                    <image-uploader></image-uploader>

                @endif

            </div>

        </div>

        <div class="form-group row">

            <label class="col-md-2 form-control-label" for="content">Status</label>

            <div class="col-md-10">

                <label class="switch switch-3d switch-primary">

                    <input type="checkbox" name="status" class="switch-input" value="1" {{ isset($model) ? ($model->status == 'enable' ? 'checked' : ''): '' }}>

                    <span class="switch-slider"></span>

                </label>

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
