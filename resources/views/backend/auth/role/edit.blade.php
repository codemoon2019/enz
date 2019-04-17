@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('content')
    {{ html()->modelForm($role, 'PATCH', route('admin.auth.roles.update', $role))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.roles.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr/>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.roles.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
                            @if ($permissions->count())
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-3">
                                            <div class="checkbox mb-2">
                                                {{ html()->label(
                                                        html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)
                                                            ->class('ml-4 switch-input')
                                                            ->id('permission-'.$permission->id)
                                                        . '<span class="switch-slider"></span>')
                                                    ->class('switch switch-sm switch-pill switch-primary mr-2')
                                                    ->style('margin-bottom: -5px')
                                                    ->for('permission-'.$permission->id) }}
                                                {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.roles.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection