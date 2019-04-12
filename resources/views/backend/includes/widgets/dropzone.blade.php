<div class="mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label>{{ __('dropzone.label') }}</label>
            <div id="{{ $id }}" class="dropzone text-center">
                <div class="default-dz-message dz-message">
                    <div class="text-center image-default">
                        @if(isset($image) && $image)
                            <div class="dropzone-icon"><img src="{{ $image }}" class="img-responsive"/></div>
                        @else
                            <div class="dropzone-icon"><i class="fa fa-5x fa-image"></i></div>
                        @endif
                        <span>{{ __('dropzone.insturuction') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('after-scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>

@endpush