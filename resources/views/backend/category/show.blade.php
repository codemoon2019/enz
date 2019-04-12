@extends('backend.layouts.app')
@section ('title', $model->title .' - Category Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model', ['model' => $model])
        @slot('title')
            {{ $model->title }} {!! $model->status == 'enable' ? '<small class="badge badge-success">Enabled</small>' : '<small class="badge badge-danger">Disabled</small>' !!}
        @endslot
        @slot('secondary_title', 'Category Management')
        @slot('actions', $model->actions('backend', ['hierarchy', 'edit', 'destroy']))
        @slot('content')
            @include('backend.includes.widgets.tabs', ['links' => [
                [
                    'name' => 'Overview',
                    'template' => 'backend.category.partials.overview',
                    'args' => [ 'model' => $model ]
                ]
            ]])
        @endslot

        @slot('footer')
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>Date
                            Created: </strong> {{ $model->created_at->timezone(get_user_timezone())->format(config('core.settings.datetime_format')) }}
                        ({{ $model->created_at->diffForHumans() }}),
                        <strong>Date
                            Modified:</strong> {{ $model->updated_at->timezone(get_user_timezone())->format(config('core.settings.datetime_format')) }}
                        ({{ $model->updated_at->diffForHumans() }})
                    </small>
                </div>
            </div>
        @endslot

    @endcomponent
@endsection


