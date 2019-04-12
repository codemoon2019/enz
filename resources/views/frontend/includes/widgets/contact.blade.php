@inject('MODEL', 'App\Models\Core\Inquiry')
<div class="panel panel-default relative ql-container">
    @include('frontend.includes.widgets.quick-link', ['model' => $MODEL, 'actions' => $MODEL->actions('backend', ['index'])])

    {!! html()->form('POST', route('frontend.contact.send'))->id('contact-form')->class('has-validator row')->attribute('accept-charset', 'UTF-8')->open() !!}
        <div class="form-group webform-component webform-textfield col-sm-6 col-xl-12">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {!! html()->text('full_name', old('full_name'))->class('form-control')->required(true) !!}
            <label>Full Name*</label>
        </div>
        <div class="form-group webform-component webform-email col-sm-6 col-xl-12">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {!! html()->email('email', old('email'))->class('form-control')->required(true) !!}
            <label>E-mail Address*</label>
        </div>
        <div class="form-group webform-component webform-textfield col-sm-6 col-xl-12">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{-- {!! html()->text('contact', old('contact'))->class('form-control')->required(true) !!} --}}
            <input type="text" class="form-control" value="{{ old('contact') }}" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            <label for="contact">Contact Number*</label>
        </div>
        <div class="form-group webform-component webform-select col-sm-6 col-xl-12">
            {{-- <label>Subject <i class="text-danger">*</i></label> --}}
            {{-- {!! html()->text('subject', old('subject'))->class('form-control')->required(true) !!} --}}
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            <select name="type" class="w-100 form-control">
                <option class="disabled" disabled selected value="">Type of Inquiry*</option>
                <option value="general">General</option>
                <option value="industrial">Industrial</option>
            </select>
        </div>
        {{-- <div class="form-group text-center captcha">
                <div class="g-recaptcha"
                data-sitekey="6LdsTI4UAAAAAJwC2-jgCJ26_lCLy9zG2kY70aIc"
                data-size="invisible">
                </div>
        </div> --}}
        <div class="form-group webform-component webform-textarea col-12">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {!! html()->textarea('message', old('message'))->attribute('rows', 4)->class('form-control')->required('true') !!}
            <label for="message">Message*</label>
        </div>

        <div class="form-group text-center captcha col-12">
                {{-- <div class="g-recaptcha"
                data-sitekey="6LdsTI4UAAAAAJwC2-jgCJ26_lCLy9zG2kY70aIc"
                data-size="invisible"> --}}
            {{-- </div> --}}
            {{-- <div class="g-recaptcha d-ib" data-callback="verifyRecaptchaCallback" data-sitekey="6LfOslEUAAAAACZg9WKKuN2gyxb7BVYgTRIdRnRG" data-callback="onSubmit" data-expired-callback="expiredRecaptchaCallback"></div> --}}
            {{-- <div class="g-recaptcha" data-sitekey="6LfOslEUAAAAACZg9WKKuN2gyxb7BVYgTRIdRnRG" data-size="invisible"></div> --}}
            {{-- <input type="hidden" class="form-control" data-recaptcha="true" name="g_recaptcha_response"  required> --}}
        </div>

        <div class="form-actions col-12">
            {{-- <input class="btn btn-secondary text-center w-100 py15" type="submit" value="Submit"> --}}
            @if (config('access.captcha.registration'))
                <button data-sitekey="{{ config('access.captcha.sitekey') }}" data-callback='onSubmitCaptchaContact' class="g-recaptcha btn btn-secondary text-center w-100 py15"><span class="icon-holder"></span> Submit</button>
            @else
                <button class="btn btn-secondary text-center w-100 py15">Submit</button>
            @endif
        </div>
    {!! html()->form()->close() !!}
</div>


@push('after-scripts')
    @if (config('access.captcha.registration'))
		{{-- {!! Captcha::script() !!} --}}

		<script>
			function onSubmitCaptchaContact(token) {
				console.log($('.submit-icon'));
				$('.icon-holder').html('<i class="fa fa-spinner fa-spin"></i>');
				$('.icon-holder').parent().attr('disabled', true);
				$("#contact-form").submit();
			}
		</script>
    @endif
@endpush