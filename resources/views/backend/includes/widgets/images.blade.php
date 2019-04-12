<div class="mt-4 mb-4 image-dropzone-container">
    <div class="col">
        <div class="form-group row">
            <label>{{ $label }}</label>
            <div class="dropzone image-dropzone text-center">
                {!! html()->input('file', $name)
                    ->attribute('accept', (isset($acceptedFiles) && $acceptedFiles ? implode(', ', $acceptedFiles) : 'image/jpg, image/jpeg, image/png')) 
                    ->attribute('style', 'opacity: 1;')
                    !!}
                <div class="default-dz-message dz-message">
                    <div class="text-center image-default">
                        <div class="dropzone-icon dropzone-placeholder">
                            <i class="fa fa-5x fa-image"></i>
                            <span>Drop images here or click to select images.</span>
                        </div>
                        <div class="dropzone-icon dropzone-image" style="display: none;">
                            <div class="text-center">
                                <img class="img-responsive img-thumbnail"/>
                            </div>
                            <button type="button" name="btn_remove" class="btn btn-danger btn-sm">
                                <i class="fa fa-times" data-toggle="tooltip" data-placement="top"
                                   title="Remove Image"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>