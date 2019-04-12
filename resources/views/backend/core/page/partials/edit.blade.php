@component('backend.includes.widgets.form')
    @slot('url', route('admin.pages.update', $model))
    @slot('model', $model)
    @slot('method', 'PATCH')
    @slot('form_id', 'page-form')
    @slot('title', __('core_page.links.edit') .' ' . $model->title )
    @slot('secondary_title', __('core_page.management') )
    @slot('fields', 'backend.core.page.partials.fields')
    @slot('link_submit_edit', 'Submit')

    @slot('custom')
        @include('backend.includes.widgets.tab-actions', [ 
            'name' => 'More Info',
            'links' => [
                [
                    'name' => 'Meta',
                    'template' => 'backend.core.meta.form',
                    'args' => ['meta' => $model->metaTag ]
                ],
                [
                    'name' => 'Menu',
                    'template' => 'backend.core.menu.node.widgets.node',
                    'args' => ['menuable' => $model->menuable ]
                ]
            ]
        ])
    @endslot
@endcomponent