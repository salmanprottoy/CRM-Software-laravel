@component('mail::message')
# Introduction
{{$msg}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
