<div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                <label class="col-md-2 form-control-label">Title </label>
                <div class="col-md-10">
                    {!! html()->text('meta[title]',  isset($meta) ? $meta->title : old('meta.title'))
                        ->class('form-control ' . ($errors->has('meta.title') ? 'is-invalid' : '' ))
                        ->placeholder('Enter meta title')
                        ->autofocus(true) !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-md-2 form-control-label">Keywords </label>
                <div class="col-md-10">
                    {!! html()->text('meta[keywords]', isset($meta) ? $meta->keywords : old('meta.keywords'))
                        ->class('form-control ' . ($errors->has('meta.keywords') ? 'is-invalid' : '' ))
                        ->placeholder('Enter meta keywords')
                        ->autofocus(true) !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-md-2 form-control-label">Description </label>
                <div class="col-md-10">
                    {!! html()->textarea('meta[description]', isset($meta) ? $meta->description : old('meta.description'))
                        ->class('form-control ' . ($errors->has('meta.description') ? 'is-invalid' : '' ))
                        ->placeholder('Enter meta description')
                        ->attribute('rows', 4)
                        ->autofocus(true) !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-md-2 form-control-label">Image </label>
                <div class="col-md-10">
                    @if(isset($meta))
                        <image-uploader
                                :api-mode="true"
                                :uploads="{{ json_encode($meta->getUploaderImages('images', 'og_image')) }}"
                                :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'meta', 'routeKeyValue' => $meta->id])) }}"
                        ></image-uploader>
                    @else
                        <image-uploader :api-mode="false" input-name="meta[image]"></image-uploader>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    


    {{-- <h4 class="form-group"> Meta Tags </h4>
<hr/>
<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Title </label>
            <div class="col-md-10">
                {!! html()->text('meta[title]',  $meta ? $meta->title : old('meta.title'))
                    ->class('form-control ' . ($errors->has('meta.title') ? 'is-invalid' : '' ))
                    ->placeholder('Enter meta title')
                    ->autofocus(true) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">Keywords </label>
            <div class="col-md-10">
                {!! html()->text('meta[keywords]', $meta ? $meta->keywords : old('meta.keywords'))
                    ->class('form-control ' . ($errors->has('meta.keywords') ? 'is-invalid' : '' ))
                    ->placeholder('Enter meta keywords')
                    ->autofocus(true) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">Description </label>
            <div class="col-md-10">
                {!! html()->textarea('meta[description]', $meta ? $meta->description : old('meta.description'))
                    ->class('form-control ' . ($errors->has('meta.description') ? 'is-invalid' : '' ))
                    ->placeholder('Enter meta description')
                    ->attribute('rows', 4)
                    ->autofocus(true) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 form-control-label">Image </label>
            <div class="col-md-10">
                @if(isset($meta))
                    <image-uploader
                            card-class="col-sm-6 col-lg-4"
                            :api-mode="true"
                            :uploads="{{ json_encode($meta->getUploaderImages('images', 'og_image')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'meta', 'routeKeyValue' => $meta->id])) }}"
                    ></image-uploader>
                @else
                    <image-uploader :api-mode="false" input-name="meta[image]"></image-uploader>
                @endif
            </div>
        </div>
    </div>
</div> --}}