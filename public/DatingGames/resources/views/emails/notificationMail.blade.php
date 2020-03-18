@component('mail::message')
# Thanks For Registration

This is your email and password.


Email id:-   {{ $email }} 

Password: -  {{ $password }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
