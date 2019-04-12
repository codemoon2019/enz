@component('frontend.mail.message')
{{-- <p>{{ __('strings.emails.contact.email_body_title') }}</p> --}}
{{-- <p><strong>Subject: </strong> {{ $inquiry->subject }}</p> --}}
<p><strong>Date:</strong> {{ $inquiry->created_at->format('F d, Y h:i') }}</p>
<p><strong>{{ __('validation.attributes.frontend.name') }}:</strong> {{ $inquiry->full_name }}</p>
<p><strong>{{ __('validation.attributes.frontend.email') }}:</strong> {{ $inquiry->email }}</p>
<p><strong>Mobile No.:</strong> {{ $inquiry->contact ?? "N/A" }}</p>
<p><strong>Landline:</strong> {{ $inquiry->landline }}</p>
<p><strong>Gender:</strong> {{ $inquiry->gender }}</p>
<p><strong>City:</strong> {{ $inquiry->city }}</p>
<p><strong>Country:</strong> {{ $inquiry->country }}</p>
<p><strong>{{ __('validation.attributes.frontend.message') }}:</strong></p>
<p class="pre-line">{{ $inquiry->message }}</p>

{{-- Thanks,<br> --}}
{{-- <p><strong>{{ $inquiry->full_name }}</strong></p> --}}
@endcomponent