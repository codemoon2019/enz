@component('frontend.mail.message')

@if ($details['type'])

New Application Inquiry

Fullname: {{ $model['full_name'] }}

Position: {{ $model['position'] }}

Email Address: {{ $model['email_address'] }}

Mobile No: {{ $model['mobile_number'] }}

Address: {{ $model['address'] }}

Employment Status: {{ $model['employment_status'] }}

Message: {{ $model['message'] }}

@else

Hi {{ $model['full_name'] }}!

Thank you for Inquiry

@endif

@endcomponent