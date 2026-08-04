<x-layouts.dashboard :title="__('Services')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.services.index') }}">{{ __('Services') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Show') }}</li>
    </x-slot:breadcrumb>
    @include('layouts.showgen')
</x-layouts.dashboard>
