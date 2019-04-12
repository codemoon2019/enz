@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-push-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media-list">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="img-responsive img-thumbnail img-size-100-100 img-size-fixed"
                                         src="{{ $logged_in_user->picture('front-end-dashboard') }}"
                                         alt="Profile Picture">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-header">
                                    <h2 class="h4"> {{ $logged_in_user->name }} </h2>
                                </div>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fa fa-envelope-o"></i> {{ $logged_in_user->email }}<br/>
                                        <i class="fa fa-calendar-check-o"></i> {{ __('strings.frontend.general.joined') }} {{ $logged_in_user->created_at->timezone(get_user_timezone())->format(config('core.setting.formats.date')) }}
                                    </small>
                                </p>
                                <p class="card-text">

                                    <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                        <i class="fa fa-user-circle-o"></i> {{ __('navs.frontend.user.account') }}
                                    </a>

                                    @can(config('access.users.default_permissions.back_end_view_permission'))
                                        &nbsp;<a href="{{ route ('admin.dashboard')}}"
                                                 class="btn btn-danger btn-sm mb-1">
                                            <i class="fa fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                                        </a>
                                    @endcan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 col-sm-pull-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    Basic panel example
                </div>
            </div>
        </div>
    </div>
@endsection
