@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->modelForm($user, 'PATCH', route('admin.auth.users.update', $user))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.users.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.users.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr/>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.timezone'))->class('col-md-2 form-control-label')->for('timezone') }}

                        <div class="col-md-10">
                            <select name="timezone" id="timezone" class="form-control" required="required">
                                @foreach (timezone_identifiers_list() as $timezone)
                                    <option value="{{ $timezone }}" {{ $timezone == $logged_in_user->timezone ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                        <div class="table-responsive col-md-10">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                    <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        @if ($roles->count())
                                            @foreach($roles as $role)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="checkbox mb-2">
                                                            {{ html()->label(
                                                                    html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                          ->class('switch-input')
                                                                          ->id('role-'.$role->id)
                                                                    . '<span class="switch-slider"></span>')
                                                                ->class('switch switch-sm switch-pill switch-primary mr-2')
                                                                ->style('margin-bottom: -5px')
                                                                ->for('role-'.$role->id) }}
                                                            {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($role->id != 1)
                                                            @if ($role->permissions->count())
                                                                <div class="row">
                                                                    @foreach ($role->permissions as $permission)
                                                                        <div class="col-4">
                                                                            <i class="fa fa-dot-circle-o"></i> {{ ucwords($permission->name) }}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                {{ __('labels.general.none') }}
                                                            @endif
                                                        @else
                                                            {{ __('labels.backend.access.users.all_permissions') }}
                                                        @endif
                                                    </div>
                                                </div><!--card-->
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="w-25">
                                        <div class="permissions">
                                            @if ($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox mb-2">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                      ->class('switch-input')
                                                                      ->id('permission-'.$permission->id)
                                                                . '<span class="switch-slider"></span>')
                                                            ->class('switch switch-sm switch-pill switch-primary mr-3')
                                                            ->style('margin-bottom: -5px')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.users.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
