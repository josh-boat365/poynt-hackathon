<x-mail::message>
# Hello

Your order {{$reference}} has been confirmed

<x-mail::button :url="$url">
View order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
