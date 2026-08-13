<x-layouts.dashboard :title="__('Services')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.services.index') }}">{{ __('Services') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    </x-slot:breadcrumb>
    <div class="card card-success">
        <div class="card-header py-2">
            <h3 class="card-title">{{ __('Add') . ' ' . __('Service') }}</h3>
        </div>
        <x-alert />
        <form method="POST" action={{ route('dashboard.services.store') }} class="m-3" enctype="multipart/form-data"
            onsubmit="return validateMyForm(3);">
            @csrf
            @include('dashboard.services.zform')
            <x-form.button class="btn-success" displaynam="{{ __('Save') }}" />
        </form>
    </div>
</x-layouts.dashboard>
