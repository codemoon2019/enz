@extends('backend.layouts.app')
@section ('title', 'Page Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model')
        @slot('title', 'Media Management')
        @slot('content')
            <div class="iframe-container">
                <iframe src="{{ route('unisharp.lfm.show', ['type' => 'Files']) }}" frameBorder="0"></iframe>
            </div>
        @endslot
    @endcomponent
@endsection