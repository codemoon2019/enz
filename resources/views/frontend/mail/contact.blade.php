@component('frontend.mail.message')
{{-- <p>{{ __('strings.emails.contact.email_body_title') }}</p> --}}
{{-- <p><strong>Subject: </strong> {{ $inquiry->subject }}</p> --}}
<p><strong>Date:</strong> {{ $inquiry->created_at->format('F d, Y h:i') }}</p>
<p><strong>{{ __('validation.attributes.frontend.name') }}:</strong> {{ $inquiry->full_name }}</p>
<p><strong>Profession;</strong> {{ $inquiry->profession }}</p>
<p><strong>{{ __('validation.attributes.frontend.email') }}:</strong> {{ $inquiry->email_address }}</p>
<p><strong>Mobile No.:</strong> {{ $inquiry->mobile_number ?? "N/A" }}</p>
<p><strong>Location:</strong> {{ $inquiry->location }}</p>
<p><strong>Free Consultation:</strong> {{ $inquiry->consultation ? 'True' : 'False' }}</p>
<p><strong>{{ __('validation.attributes.frontend.message') }}:</strong></p>
<p class="pre-line">{{ $inquiry->inquiry }}</p>

{{-- Thanks,<br> --}}
{{-- <p><strong>{{ $inquiry->full_name }}</strong></p> --}}
@endcomponent