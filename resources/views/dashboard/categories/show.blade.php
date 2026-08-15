<x-layouts.dashboard :title="__('Categories')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.categories.index') }}">{{ __('Categories') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Show') }}</li>
    </x-slot:breadcrumb>
    @include('layouts.showgen')
</x-layouts.dashboard>
