<div class="row">
    @forelse($settings as $setting)
        <div class="col-sm-12">
            <div class="form-group">
                @switch($setting->input_type)
                    @case('text')
                    @case('textarea')
                    @case('email')
                    <label class="text-capitalize">{{ $setting->label }}</label>
                    {!! html()->{$setting->input_type}($setting->machine_name, $setting->value)
                            ->class('form-control') !!}
                    @break
                    @case('file')
                    <label class="text-capitalize">{{ $setting->label }}</label>
                    @if($setting->collection_name == 'site-favicon')
                    {{-- @dd($setting->getUploaderImages($setting->collection_name, 'default')) --}}
                    @endif
                    <image-uploader
                            :api-mode="true"
                            :accepted-mime-types="{{ $setting->mime_type }}"
                            :uploads="{{ json_encode($setting->getUploaderImages($setting->collection_name, 'default')) }}"
                            :upload-url="{{ json_encode(route('webapi.admin.image.upload', ['model' => 'setting', 'routeKeyValue' => $setting->id, 'conversion' => 'default'])) }}"
                    ></image-uploader>
                    @break
                @endswitch
            </div>
        </div>
    @empty
        <div class="col-sm-12 text-center form-group">
            <b class="h3 text-muted">There are no settings set. Please contact the developers if you want to add.</b>
        </div>
    @endforelse
</div>

