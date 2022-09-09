<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width" name="viewport" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <title>Contact form</title>
</head>

<body style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
    <h1>
        {{ setting('site.title') }} - Contact form
    </h1>

    <p>
        <strong>Name:</strong> {{ $contact->name }} <br />
        <strong>Phone number:</strong> {{ $contact->phone }} <br />
        <strong>E-mail:</strong> {{ $contact->email }} <br />
        <strong>Message:</strong> {{ $contact->message }} <br />
        <strong>Form:</strong> {{ $contact->type_title }} <br />
        @if($car)
        <strong>Car:</strong> <a href="{{ $car->url }}" target="_blank">{{ $car->full_name }}</a> <br />
        @endif
    </p>
</body>

</html>
