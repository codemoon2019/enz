@extends('backend.layouts.app')

@section ('title', 'Create Category - Category Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form')
        @slot('url', route('admin.categories.store'))
        @slot('form_id', 'category-form')
        @slot('title', 'Create Category')
        @slot('secondary_title', 'Category Management')
        @slot('fields', 'backend.category.partials.fields')
        @slot('custom')
            @include('backend.includes.widgets.dropzone', ['id' => 'dropzone'])
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
                    ]
                ]
            ])
        @endslot
        @slot('link_cancel', route('admin.categories.index'))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Edit')
    @endcomponent
@endsection


@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#category-form').multipleImageDropzone({
                dropzone: '#dropzone',
            })
        })
    </script>
@endpush

