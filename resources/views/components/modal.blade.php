@props(['id', 'title' => '', 'size' => ''])

@php
    $sizeClass = match ($size) {
        'sm', 'small' => 'modal-sm',
        'lg', 'large' => 'modal-lg',
        'xl', 'extra-large' => 'modal-xl',
        default => '',
    };
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog {{ $sizeClass }}" role="document">
        <div class="modal-content">
            @if ($title || isset($header))
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="{{ $id }}Label">
                        @isset($header)
                            {{ $header }}
                        @else
                            {{ $title }}
                        @endisset
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="modal-body">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="modal-footer justify-content-between">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
