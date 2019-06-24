@component('frontend.mail.message')

@if ($details['type'])

New Course Inquiry

Fullname: {{ $model['full_name'] }}

Profession: {{ $model['profession'] }}

Email Address: {{ $model['email_address'] }}

Mobile No: {{ $model['mobile_number'] }}

Location: {{ $model['location'] }}

School: {{ $model['school'] }}

Course: {{ $model['course'] }}

Message: {{ $model['message'] }}

@else

Hi {{ $model['full_name'] }}!

Thank you for Inquiry

@endif

@endcomponent