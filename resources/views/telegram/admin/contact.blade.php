<b>{{ setting('site.title') }} - Contact form</b>
<b>Name:</b> {{ $contact->name }}
<b>Phone number:</b> {{ $contact->phone }}
<b>E-mail:</b> {{ $contact->email }}
<b>Message:</b> {{ $contact->message }}
<b>Form:</b> {{ $contact->type_title }}
@if($car)
<b>Car:</b> <a href="{{ $car->url }}">{{ $car->full_name }}</a>
@endif
