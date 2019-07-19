@component('frontend.mail.message')

@if ($details['type'])

**Become Our Client Inquiry**

**Firstname:** {{ $data['first_name'] }}

**Lastname:** {{ $data['last_name'] }}

**Middlename:** {{ $data['middle_name'] }}

@if (isset($admin))
	
**Date of Birth:** {{ $data['country_birth'] }}

@else

**Date of Birth:** {{ $data['month'] . ' ' .$data['day'] . ', ' . $data['year'] }}

@endif

**Country Birth:** {{ $data['country_birth'] }}

**Passport Number:** {{ $data['passport_number'] }}

**Citizenship:** {{ $data['citizenship'] }}

**Civil Status:** {{ $data['civil_status'] }}

**Gender:** {{ $data['gender'] }}

@if (isset($admin))

**Expiry Date:** {{ $data['expiry_date'] }}

@else

**Expiry Date:** {{ $data['expiry_month'] . ' ' .$data['expiry_day'] . ', ' . $data['expiry_year'] }}

@endif

**Street Number:** {{ $data['street_number'] }}

**Street Name:** {{ $data['street_name'] }}

**Town/City:** {{ $data['town'] }}

**Province:** {{ $data['province'] }}

**ZIP Code:** {{ $data['zip_code'] }}

**Email:** {{ $data['email'] }}

**Mobile Number:** {{ $data['mobile_number'] }}

**Telephone Number:** {{ $data['telephone_number'] }}

**Elementary:** {{ $data['elementary_school'] . ' ' . $data['elementary_from'] . ' - ' . $data['elementary_to'] }}  

**High School:** {{ $data['high_school_school'] . ' ' . $data['high_school_from'] . ' - ' . $data['high_school_to'] }}  

**Tertiary:** {{ $data['tertiary_school'] . ' ' . $data['tertiary_from'] . ' - ' . $data['tertiary_to'] }}  

**Employment Status:** {{ $data['employment_status'] }} 

@if ($data['employment_status'] == 'Employed')
	
**Employer:** {{ $data['employment_status_name'] }}

**From:** {{ $data['employment_status_from'] }}

**To:** {{ $data['employment_status_to'] }}

@elseif ($data['employment_status'] == 'Self Employed')

**Business Name:** {{ $data['employment_status_name'] }}

**From:** {{ $data['employment_status_from'] }}

**To:** {{ $data['employment_status_to'] }}


@endif

**Interview:** {{ $data['interview'] }}

**English Test Result:** {{ $data['english_test_result'] }}

**Would you like to avail our free English Test Review? :** {{ $data['avail'] }} 

**Declaration:**

<ul>
	<li>I declare that all the information and supporting documentations provided above are true and correct</li>
	<li>I declare that I have received a proper orientation and interview prior to my application</li>
	<li>I understand that all the fees and charges associated with my application is non-refundable</li>
	<li>I understand that ENZ Education Consultancy Services does not guarantee any result of this application as my visa application will be based on my GTE and Financial Capacity in undertaking my course in Australia</li>
	<li>I understand that ENZ Education Consultancy Services are not an employment agency</li>
</ul>

**Country:** {{ $data['country'] }}

@else

Thank you for reaching ENZ Education Consultancy Services! One of our consultants shall get back to you with benefits, cost and requirements of studying abroad as soon as possible.

Thank you for your trust in our services.


Regards, <br> ENZ Education Consultancy Services

@include('frontend.mail.links')

@endif

@endcomponent