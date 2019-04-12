@component('frontend.mail.message')

@if ($details['type'])

New Inquiry

Fullname: {{ $model['full_name'] }}

Email: {{ $model['email'] }}

Contact No: {{ $model['contact'] }}

Postcode: {{ $model['postcode'] }}

Message: {{ $model['message'] }}

@else

Hi {{ $model['full_name'] }}!

Thank you for Inquiry

@endif

@endcomponent

