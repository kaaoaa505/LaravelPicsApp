@props(['action', 'method' => 'POST'])

@php
    $method = strtolower($method);
@endphp
<form action="{{ $action }}" method="{{ $method == 'get' ? $method : 'post'  }}" {{$attributes}}>
    @csrf

    @unless(in_array($method, ['post', 'get']))
        @method($method)
    @endunless

    {{ $slot }}
</form>
