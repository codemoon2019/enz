@component('frontend.mail.message')

@if ($details['type'])

New Inquiry

Fullname: {{ $model['first_name'] . ' ' . $model['last_name'] }}

Email: {{ $model['email_address'] }}

Contact No: {{ $model['contact_number'] }}

Address: {{ $model['address'] }}

Profession: {{ $model['profession'] }}

@else

Hi {{ $model['first_name'] }}!

Thank you for Inquiry

@endif

@endcomponent