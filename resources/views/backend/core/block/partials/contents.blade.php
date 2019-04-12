<div class="row mt-4 mb-4">
    <div class="col">
        {{-- @dd($model->draggable_forms) --}}
        <draggable-forms
            name="content"
            title-field="title"
            :forms="{{ json_encode($model->draggable_forms) }}"
            :new-form-format="{{ json_encode($model->draggable_form_format) }}"
            reorder-endpoint="{{ route('webapi.admin.block-content.reorder', ['eventId' => $model->id]) }}"
            reorder-method="POST"
            create-endpoint="{{ route('webapi.admin.block-content.create', ['eventId' => $model->id]) }}"
            create-method="POST"
            update-endpoint="{{ route('webapi.admin.block-content.update') }}"
            update-method="PATCH"
            delete-endpoint="{{ route('webapi.admin.block-content.remove') }}"
            delete-method="DELETE"
        ></draggable-forms>
    </div>
</div>
