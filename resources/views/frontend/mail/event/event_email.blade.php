@component('frontend.mail.message')

@if ($details['type'])

**New Event Inquiry**

**Event:** {{ $model->event_name }}

**When:** {{ $model->date }}

**Where:** {{ $model->location }}

**Time:** {{ $model->time }}

**Fullname:** {{ $model['first_name'] . ' ' . $model['last_name'] }}

**Email:** {{ $model['email_address'] }}

**Contact No:** {{ $model['contact_number'] }}

**Address:** {{ $model['address'] }}

**Profession:** {{ $model['profession'] }}

@else

Hi {{ $model['first_name'] }}!

Thank you for registering for our Free Orientation! We look forward seeing you at the event to help you with your study abroad needs!

**Event Details: {{ $model->event_name }}**<br>

**When:** {{ $model->date }}<br>

**Where:** {{ $model->location }}<br>

**Time:** {{ $model->time }}<br>

You can invite your friends to come and discover what studying abroad can offer! Be sure to save the date on your calendar!

Get more updates by following our social media channels!

<ul>
	<li><a href="https://www.facebook.com/enzecs/">https://www.facebook.com/enzecs/</a></li>
	<li><a href="https://instagram.com/enzconsultancy">https://instagram.com/enzconsultancy</a></li>
	<li><a href="http://twitter.com/enzconsultancy">http://twitter.com/enzconsultancy</a></li>
</ul>

Thank you and see you there!

@endif

@endcomponent