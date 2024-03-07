<x-mail::message>
# {{$subject}}

<h3>   {{$body}}</h3>

<x-mail::button :url="$link">
    {{$subject}}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
