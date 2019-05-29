@extends('backend.layouts.app')

@push('after-styles')

<style>

    .card-title{ display: none; }

    .card-body hr{ display: none;}

</style>

@endpush

@section('content')

    @component('backend.includes.widgets.box-model')

        @slot('content')

            @include('backend.includes.widgets.tabs', [
                'links' => [
                    [
                        'name' => 'Basic Details',
                        'template' => 'backend.news.partials.edit',
                        'icon' => 'fa fa-user',
                        'args' => [ 'model' => $model ]
                    ],
                    [
                        'name'     => 'Templates',
                        'template' => 'backend.includes.templates.index',
                        'icon' => 'fa fa-cart-arrow-down',
                        'args'     => [ 'model' => $model ]
                    ],
                ]
            ])

        @endslot

    @endcomponent

@endsection

