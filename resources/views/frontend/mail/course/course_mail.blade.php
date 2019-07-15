@component('frontend.mail.message')

@if ($details['type'])

**New Course Inquiry**

**Fullname:** {{ $model['full_name'] }}

**Profession:** {{ $model['profession'] }}

**Email Address:** {{ $model['email_address'] }}

**Mobile No:** {{ $model['mobile_number'] }}

**Location:** {{ $model['location'] }}

**School:** {{ $model['school'] }}

**Course:** {{ $model['course'] }}

**Message:** {{ $model['message'] }}

@else

Hi {{ $model['full_name'] }}! Thank you for reaching ENZ Education Consultancy Services! One of our consultants shall get back to you with benefits, cost and requirements of studying abroad as soon as possible.

Thank you for your trust in our services.

Regards, <br> ENZ Education Consultancy Services

@include('frontend.mail.links')

@endif

@endcomponent