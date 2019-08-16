@component('frontend.mail.message')

@if ($details['type'])

**New Inquiry**

**Fullname:** {{ $model['full_name'] }}

**Profession:** {{ $model['profession'] }}

**Email Address:** {{ $model['email_address'] }}

**Mobile No:** {{ $model['mobile_number'] }}

**Location:** {{ $model['location'] }}

**Message:** {{ $model['inquiry'] }}

@if ($model['country'] != null)
	
**Country:** {{ $model['country'] }}

@endif

@else

Thank you for reaching ENZ Education Consultancy Services! One of our consultants shall get back to you with benefits, cost and requirements of studying abroad as soon as possible.

Thank you for your trust in our services.


Regards, <br> ENZ Education Consultancy Services

@include('frontend.mail.links')

@endif

@endcomponent