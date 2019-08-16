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

            <label class="col-md-2 form-control-label">Color</label>

            <div class="col-md-10">

                <select name="color" class="form-control">

                    <option value="red" {{ isset($model) ? ($model->color == 'red' ? 'selected' : '') : '' }}>Red</option>

                    <option value="yellow" {{ isset($model) ? ($model->color == 'yellow' ? 'selected' : '') : '' }}>Yellow</option>

                    <option value="green" {{ isset($model) ? ($model->color == 'green' ? 'selected' : '') : '' }}>Green</option>

                </select>

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
                        :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'core-values', 'routeKeyValue' => $model->slug, 'collection' => 'featured'])) }}"
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
