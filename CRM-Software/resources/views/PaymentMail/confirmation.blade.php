@component('mail::message')
# Your Transaction id is: {!! $mail_data['tran_id'] !!}

Your payment for DeskApp 1 month subcription confirmed.


@component('mail::button', ['url' => 'http://localhost:8000/register/manager'])
        Click Here to Register
@endcomponent

Thanks,<br>
DeskApp
@endcomponent
