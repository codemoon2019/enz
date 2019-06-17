@component('frontend.mail.message')

@if ($details['type'])

New Inquiry

Fullname: {{ $model['full_name'] }}

Profession: {{ $model['profession'] }}

Email Address: {{ $model['email_address'] }}

Mobile No: {{ $model['mobile_number'] }}

Location: {{ $model['location'] }}

Message: {{ $model['inquiry'] }}

Country: {{ $model['country'] }}

@else

Hi {{ $model['full_name'] }}!

Thank you for Inquiry

@endif

@endcomponent