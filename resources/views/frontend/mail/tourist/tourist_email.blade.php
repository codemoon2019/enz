@component('frontend.mail.message')

@if ($details['type'])

New Tourist Visa Inquiry

Fullname: {{ $model['first_name'] . ' ' . $model['last_name'] }}

Email: {{ $model['email_address'] }}

Contact No: {{ $model['mobile_number'] }}

Country to visit: {{ $model['country_to_visit'] }}

Message: {{ $model['inquiry'] }}

@else

Hi {{ $model['first_name'] }}!

Thank you for Inquiry

@endif

@endcomponent
