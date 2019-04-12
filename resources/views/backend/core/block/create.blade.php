@extends('backend.layouts.app')

@section ('title', 'Create Block - Block Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form')
        @slot('url', route('admin.blocks.store'))
        @slot('form_id', 'block-form')
        @slot('title', 'Create Block')
        @slot('secondary_title', 'Block Management')
        @slot('fields', 'backend.core.block.partials.fields')
        @slot('link_cancel', route('admin.blocks.index'))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Edit')
    @endcomponent
@endsection


