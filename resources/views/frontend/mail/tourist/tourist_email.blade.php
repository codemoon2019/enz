@component('frontend.mail.message')

@if ($details['type'])

New Tourist Visa Inquiry

Fullname: {{ $model['first_name'] . ' ' . $model['last_name'] }}

Email: {{ $model['email_address'] }}

Contact No: {{ $model['mobile_number'] }}

Country to visit: {{ $model['country_to_visit'] }}

Message: {{ $model['inquiry'] }}

@else

Dear {{ $model['first_name'] }},

Thank you for reaching ENZ Education Consultancy Services! One of our consultants shall get back to you with the cost and requirements of tourist visa as soon as possible.

Thank you for your trust in our services.


Regards, <br> ENZ Education Consultancy Services

Follow us on social media!
<a href="https://www.facebook.com/enzecs/">https://www.facebook.com/enzecs/</a>
<a href="https://instagram.com/enzconsultancy">https://instagram.com/enzconsultancy</a>
<a href="http://twitter.com/enzconsultancy">http://twitter.com/enzconsultancy</a>

@endif

@endcomponent
