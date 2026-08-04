@props([
    'type' => 'submit',
    'size' => 2,
    'displaynam' => '',
    'usedfor' => '',
])
<div @class([
    'form-group',
    'col-md-' . $size,
    'my-1 px-0' => $usedfor != '',
])>
    <button type="{{ $type }}"
        {{ $attributes->class([
            'btn',
            'px-4 mt-4' => $usedfor == '',
            'btn-white form-control form-control-sm p-0' => $usedfor == 'filter',
            'btn-primary form-control form-control-sm p-0' => $usedfor == 'search',
        ]) }}>
        @if ($usedfor == 'filter')
            <i class="fas fa-filter"></i>
        @endif
        @if ($usedfor == 'search')
            <i class="fas fa-search"></i>
        @endif
        @if ($usedfor == 'clear')
            <i class="fas fa-eraser"></i>
        @endif
        {{ $displaynam }}
    </button>
</div>



{{-- @props([
    'type' => 'submit',
    'size' => 2,
    'displaynam' => '',
    'icon' => '',
])
<div @class(['form-group', 'col-md-' . $size, 'my-1 px-0' => $icon != ''])>
    <button type="{{ $type }}" {{ $attributes->class(['btn', 'px-4 mt-4' => $icon == '']) }}>
        @if ($icon != '')
            <i class="{{ $icon }}"></i>
        @endif
        {{ $displaynam }}
    </button>
</div> --}}
{{-- <a class="btn btn-outline-success" href="{{ route('dashboard.serials.import.index') }}">{{ __('Import Excel') }}
    <i class="fas fa-file-excel px-2"></i></button>
</a>

<div class="form-group my-1 col-md-1 px-0">
    <button class="btn btn-white form-control form-control-sm p-0"><i
            class="fas fa-filter"></i>{{ __('Filter') }}</button>
</div> --}}
