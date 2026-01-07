@props(['messages'])

@if ($messages)
    <span {{ $attributes->merge(['class' => 'text-danger small d-block mt-1']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}<br>
        @endforeach
    </span>
@endif

{{-- adminlte --}}
