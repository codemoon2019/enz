@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.box-model')

        @slot('title', $model->title)
        @slot('secondary_title', 'Subscription Management')
        @slot('actions', $model->actions('backend', ['edit']))

        @slot('content')
            @include('backend.includes.widgets.tabs', [
               'links' => [
                   [
                       'name' => 'Overview',
                       'template' => $viewPath . '.partials.overview',
                       'args' => [ 'model' => $model ]
                   ],
               ]
           ])
        @endslot

        @slot('footer')
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>Date Created: </strong> {{ $model->created_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12')) }}
                        ({{ $model->created_at->diffForHumans() }}),
                        <strong>Date Modified:</strong> {{ $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12')) }}
                        ({{ $model->updated_at->diffForHumans() }})
                    </small>
                </div>
            </div>
        @endslot

    @endcomponent
@endsection


