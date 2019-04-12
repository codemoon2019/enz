<div class="form-group row">
    <label class="col-md-2 form-control-label">Published To <i class="text-danger">*</i></label>
    <div class="col-md-10">
        @if(isset($model))
            <input-tags
                    element-id="domains"
                    input-class="form-control"
                    placeholder="Select Domain"
                    :limit="0"
                    :values="{{ json_encode(old('domains') ? explode(',', old('domains')) : ($model->domains ? $model->domains->pluck('machine_name') : [])) }}"
                    :existing-tags="{{ json_encode($domains) }}"
            >
            </input-tags>
        @else
            <input-tags
                    element-id="domains"
                    input-class="form-control"
                    placeholder="Select Domain"
                    :limit="0"
                    :existing-tags="{{ json_encode($domains) }}"
            >
            </input-tags>
        @endif
    </div>
</div>