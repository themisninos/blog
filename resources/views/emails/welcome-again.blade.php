@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://themisninos.gr'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum dolor sit amet.
@endcomponent

@component('mail::table', ['url' => ''])
Lorem ipsum dolor sit amet.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
