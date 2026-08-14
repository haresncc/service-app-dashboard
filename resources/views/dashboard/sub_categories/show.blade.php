<x-layouts.dashboard :title="__('Sub Categories')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.sub-categories.index') }}">{{ __('Sub Categories') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Show') }}</li>
    </x-slot:breadcrumb>
    @include('layouts.showgen')
</x-layouts.dashboard>
