@component('backend.includes.widgets.form')

    @slot('url', route($routePath . '.update', $model))
    @slot('model', $model)
    @slot('method', 'PATCH')
    @slot('form_id', 'block-form')
    @slot('title', 'Edit ' . $model->title )

    @slot('fields', $viewPath . '.partials.fields')
    @slot('link_cancel', route($routePath . '.show', $model))

    @slot('link_submit', 'Save')
    @slot('link_submit_edit', 'Save & Continue')


@endcomponent