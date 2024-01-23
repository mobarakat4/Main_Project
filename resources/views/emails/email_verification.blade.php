<x-mail::message>
# Introduction

click button to verify your email.

<x-mail::button :url="$url">
Email Verify
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
