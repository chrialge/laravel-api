<x-mail::message>
    # Introduction

    Name Sender: {{ $lead->first_name }} {{ $lead->first_name }}

    Email Sender: {{ $lead->email }}

    ## message
    Message Sender:

    {{ $lead->message }}

    The body of your message.

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
