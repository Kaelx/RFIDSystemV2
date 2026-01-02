@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    $alignmentClasses = match ($align) {
        'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
        'top' => 'origin-top',
        default => 'ltr:origin-top-right rtl:origin-top-left end-0',
    };

    $width = match ($width) {
        '48' => 'w-48',
        default => $width,
    };
@endphp

<div class="dropdown" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">
        {{ $trigger }}
    </div>
    <div x-show="open" class="dropdown-menu show {{ $width }} {{ $alignmentClasses }} {{ $contentClasses }}"
        style="display: block; min-width: 0;">
        {{ $content }}
    </div>
</div>
