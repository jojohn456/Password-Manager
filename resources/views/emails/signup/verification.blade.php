@component('mail::message')

Hello {{$firstname}},

Click the button below to verify your account.

@component('mail::button', ['url' => config('app.url').'/verify/'.$verification_token ])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent