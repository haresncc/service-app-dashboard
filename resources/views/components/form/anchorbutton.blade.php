@props([
    'type' => 'button',
    'href' => '#',
    'displaynam' => '',
    'icon' => 'fas fa-file-excel px-2',
])
<a href="{{ $href }}">
    <button type="{{ $type }}" {{ $attributes->class(['btn', 'btn-outline-success']) }}>
        @if ($icon != '')
            <i class="{{ $icon }}"></i>
        @endif
        {{ $displaynam }}
    </button>
</a>
{{-- <a class="btn btn-outline-success" href="{{ route('dashboard.serials.import.index') }}">{{ __('Import Excel') }}
    <i class="fas fa-file-excel px-2"></i></button>
</a>

<a href="{{ route('dashboard.serials.import.index') }}">
    <button class="btn btn-outline-success"><i class="fas fa-file-excel px-2"></i>{{ __('Import Excel') }}</button>
</a> --}}
