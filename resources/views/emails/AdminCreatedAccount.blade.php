@component('mail::message')
# Hey {{ $user->name }}

An admin on your school E-Gradebook has created an account for you using this email address. Please use following credentials to login. <br>
Email: `Your current email address.` <br>
Password `{{ $password }}` <br>

@component('mail::button', ['url' => url('/auth/signin')])
Sign in here.
@endcomponent

Thanks<br>
@endcomponent
