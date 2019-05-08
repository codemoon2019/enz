@extends('backend.layouts.app')

@push('after-styles')

<style>

    .card-title{ display: none; }

    .card-body hr{ display: none;}

    .input-group-btn{
        position: absolute;
        right: 4px;
        margin-top: -16px;
    }

</style>

@endpush

@section('content')

    @component('backend.includes.widgets.box-model')

        @slot('content')

            @include('backend.includes.widgets.tabs', [
                'links' => [
                    [
                        'name' => 'Basic Details',
                        'template' => 'backend.country.partials.edit',
                        'icon' => 'fa fa-user',
                        'args' => [ 'model' => $model ]
                    ],
                    [
                        'name'     => 'Other Details',
                        'template' => 'backend.country.partials.other_details',
                        'icon' => 'fa fa-cart-arrow-down',
                        'args'     => [ 'model' => $model ]
                    ],
                    [
                        'name'     => 'Linkages',
                        'template' => 'backend.country.partials.linkages',
                        'icon' => 'fa fa-cart-arrow-down',
                        'args'     => [ 'model' => $model ]
                    ],
                ]
            ])

        @endslot

    @endcomponent

@endsection

