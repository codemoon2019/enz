@extends('backend.layouts.app')
@section ('title', 'Settings | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model')
        @slot('title', 'Settings - ' . $currentDomain->title)
        @slot('buttons')

            <div class="btn-group mr-1">
                {!! html()->form('POST', route('admin.settings.cache.flush'))->open() !!}
                <button type="submit" class="btn btn-secondary" onclick="pageLoading()" data-toggle="tooltip"
                        data-placement="top" title="Clear cache"><i class="fa fa-eraser"></i></button>
                {!! html()->form()->close() !!}
            </div>

        @endslot
        @slot('content')
            <div class="row">
                @foreach(config('core.setting.management') as $group)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header clearfix">
                                {{ "Group {$group['group_name']}" }}
                                <a href="{{ route('admin.settings.show', $group['group_name']) }}?domain-name={{ app('request')->get('domain-name') }}"
                                   class="btn btn-primary btn-sm pull-right"><i class="fa fa-cog"></i> Configure</a>
                            </div>
                            <div class="card-body">{{ "Group {$group['group_name']} settings" }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endslot
    @endcomponent
@endsection
