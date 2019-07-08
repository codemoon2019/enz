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

Thank you for sending your employment application at ENZ Education Consultancy Services. We appreciate your interest and the time you've invested. We'll thoroughly review your application and will keep you posted as soon as posible.


Regards, <br> ENZ Education Consultancy Services

@endif

@endcomponent