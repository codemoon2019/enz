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

@if ($details['subject'] == 'MIGRATION VISA INQUIRY')

Hi {{ $model['full_name'] }},

We have received your migration inquiry. One of our consultants will get in touch with you shortly. If you have booked a formal legal assessment, please wait for the booking confirmation.


Regards, <br> ENZ Education Consultancy Services

@else

Thank you for reaching ENZ Education Consultancy Services! One of our consultants shall get back to you with benefits, cost and requirements of studying abroad as soon as possible.

Thank you for your trust in our services.


Regards, <br> ENZ Education Consultancy Services

@endif

@include('frontend.mail.links')

@endif

@endcomponent