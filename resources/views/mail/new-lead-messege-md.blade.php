<x-mail::message>
    # Introduction

    Name Sender: {{ $lead->first_name }} {{ $lead->first_name }}

    Email Sender: {{ $lead->email }}

    ## message
    Message Sender:

    {{ $lead->message }}



    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
