@component('frontend.mail.message')

@if ($details['type'])

New Inquiry

@else

Hi {{ $data['first_name'] }}!

Thank you for Inquiry

@endif

@endcomponent