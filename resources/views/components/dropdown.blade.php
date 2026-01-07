@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    $alignmentClasses = $align === 'right' ? 'dropdown-menu-right' : '';

    $width = $width === '48' ? 'w-48' : $width;
@endphp

<div
    {{ $attributes->merge(['class' => trim('dropdown-menu ' . $alignmentClasses . ' ' . $width . ' ' . $contentClasses)]) }}>
    {{ $slot }}
</div>


{{-- adminlte --}}
