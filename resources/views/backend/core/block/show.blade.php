@extends('backend.layouts.app')
@section ('title', $model->title .' - Block Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model')
        @slot('title', $model->title)
        @slot('secondary_title', 'Block Management')
        @slot('actions', $model->actions('backend', ['edit', 'destroy']))
        @slot('content')

        @endslot
    @endcomponent
@endsection


