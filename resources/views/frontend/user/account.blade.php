@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <h1 class="h3 strong"> {{ __('navs.frontend.user.account') }} </h1>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#profile" aria-controls="profile" role="tab"
                       data-toggle="tab">{{ __('navs.frontend.user.profile') }}</a>
                </li>
                <li role="presentation">
                    <a href="#edit" aria-controls="edit" role="tab"
                       data-toggle="tab">{{ __('labels.frontend.user.profile.update_information') }}</a>
                </li>
                @if ($logged_in_user->canChangePassword())
                    <li role="presentation">
                        <a href="#password" aria-controls="password" role="tab"
                           data-toggle="tab">{{ __('navs.frontend.user.change_password') }}</a>
                    </li>
                @endif
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    @include('frontend.user.account.tabs.profile')
                </div>
                <div role="tabpanel" class="tab-pane" id="edit">
                    @include('frontend.user.account.tabs.edit')
                </div>
                @if ($logged_in_user->canChangePassword())
                    <div role="tabpanel" class="tab-pane" id="password">
                        @include('frontend.user.account.tabs.change-password')
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
