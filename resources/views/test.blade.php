<x-layout>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="">
    
    <x-icon src="just for test"></x-icon>
    
    <hr>
    
    <x-icon></x-icon>
    
    <hr>
    
    @php
        $i = 123;
        $logo = 'icons/logo.svg';
    @endphp
    <x-icon :src="$i"></x-icon>
    
    <hr>
    
    <x-icon :img-src="$logo"></x-icon>
    
    <hr>
    
    <x-ui.button></x-ui.button>
    
    <hr>
    
    <x-alert>Alert 1.</x-alert>
    
    <hr>
    
    <x-alert>
        <x-slot name="title">
            ==>>"Alert 1.1."<<== </x-slot>
                Test alert with head and body content with custom html elements.
                <a href="#" class="alert-link">More Info.</a>
    </x-alert>
    
    <hr>
    
    <x-alert type="warning" dismissible="false">
        {{ $component->icon() }} Alert 2.
    </x-alert>
    
    <hr>
    
    <x-alert type="error" dismissible="true">
        {{ $component->icon() }} Alert 3.
    </x-alert>
    
    <hr>
    
    <x-alert type="danger" id="my-alert" class="p-5" role="flash">
        Alert 4.
        <br>
        <a href="#">More Info 1.</a>
        <hr>
        <a href="#" class="alert-link">More Info 2.</a>
        <hr>
        {{ $component->icon() }}
        {{ $component->link('More Info 3', '#') }}
    </x-alert>
    
    <hr>
    
    <x-alert type="danger" dismissible="true">
        Alert 5.
    </x-alert>
    
    <hr>
    
    <x-alert type="warning" class="mt-4 d-flex justify-content-between" dismissible="true">
        {{ $component->icon() }}
        <span>
            Alert 5.
        </span>
        {{ $component->icon() }}
    </x-alert>
    
    <x-form id="custom-form-id" class="custom-form-class" action="{{route('test')}}" method="get">
        just for test
        <input type="text" name="test">
        <button type="submit" class="btn btn-primary">Submit</button>
    </x-form>
</x-layout>