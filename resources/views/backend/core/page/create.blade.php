@extends('backend.layouts.app')

@section ('title', 'Create Page - Page Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form')
        @slot('url', route('admin.pages.store'))
        @slot('form_id', 'page-form')
        @slot('title', 'Create Page')
        @slot('secondary_title', 'Page Management')
        @slot('fields', 'backend.core.page.partials.fields')
        @slot('link_cancel', route('admin.pages.index'))
        @slot('link_submit_edit', 'Submit')

        @slot('custom')
            @include('backend.includes.widgets.tab-actions', [ 
                'name' => 'More Info',
                'links' => [
                    [
                        'name' => 'Meta',
                        'template' => 'backend.core.meta.form',
                        'args' => ['meta' => null]
                    ],
                    [
                        'name' => 'Menu',
                        'template' => 'backend.core.menu.node.widgets.node',
                        'args' => ['menuable' => null ]
                    ],
                ]
            ])
        @endslot
    @endcomponent
@endsection
