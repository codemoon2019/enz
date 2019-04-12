<div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                <div class="col-sm-12">
                    @if(isset($model))
                        <image-uploader
                                :api-mode="true"
                                :multiple="false"
                                :accepted-mime-types="['image/jpeg', 'image/png']"
                                :uploads="{{ json_encode($model->getUploaderImages($model->template, 'regular')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'blocks', 'routeKeyValue' => $model->slug, 'collection' => $model->template])) }}"
                            ></image-uploader>
                    @else
                        <image-uploader :api-mode="false" input-name="main_image"></image-uploader>
                    @endif
                </div>
            </div>
        </div>
    </div>
    