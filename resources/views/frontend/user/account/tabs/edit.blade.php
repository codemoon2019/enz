{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
<div class="col-sm-12 panel-body">
    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

        <div>
            <input type="radio" name="avatar_type"
                   value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
            <input type="radio" name="avatar_type"
                   value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

            @foreach ($logged_in_user->providers as $provider)
                @if (strlen($provider->avatar))
                    <input type="radio" name="avatar_type"
                           value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                @endif
            @endforeach
        </div>
    </div><!--form-group-->

    <div class="form-group" id="avatar_location">
        {{ html()->file('avatar_location')->class('form-control') }}
    </div><!--form-group-->
</div><!--row-->

<div class="col-sm-12">
    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

        {{ html()->text('first_name')
            ->class('form-control')
            ->placeholder(__('validation.attributes.frontend.first_name'))
            ->attribute('maxlength', 191)
            ->required()
            ->autofocus() }}
    </div><!--form-group-->
</div><!--row-->

<div class="col-sm-12">
    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

        {{ html()->text('last_name')
            ->class('form-control')
            ->placeholder(__('validation.attributes.frontend.last_name'))
            ->attribute('maxlength', 191)
            ->required() }}
    </div><!--form-group-->
</div><!--row-->

@if ($logged_in_user->canChangeEmail())
    <div class="col-sm-12">
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> {{  __('strings.frontend.user.change_email_notice') }}
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

            {{ html()->email('email')
                ->class('form-control')
                ->placeholder(__('validation.attributes.frontend.email'))
                ->attribute('maxlength', 191)
                ->required() }}
        </div><!--form-group-->
    </div><!--row-->
@endif

<div class="col-sm-12">
    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.timezone'))->for('timezone') }}

        <select name="timezone" id="timezone" class="form-control" required="required">
            @foreach (timezone_identifiers_list() as $timezone)
                <option value="{{ $timezone }}" {{ $timezone == $logged_in_user->timezone ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
            @endforeach
        </select>
    </div><!--form-group-->
</div><!--row-->

<div class="col-sm-12">
    <div class="form-group mb-0 clearfix">
        {{ form_submit(__('labels.general.buttons.update')) }}
    </div><!--form-group-->
</div><!--row-->
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script type="text/javascript">
        $(function () {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function () {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush