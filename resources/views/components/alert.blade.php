<div
    {{ $attributes->merge([
            'class' => $getClasses,
            'role' => $attributes->prepends('alert'),
        ]) }}>

    @isset($title)
        <h4 class="alert-heading">
            {{ $title }}
        </h4>
    @endisset

    {{ $slot }}

    @if ($dismissible)
        <button type="button" class="btn btn-lg close close-alert-btn" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>
