<x-layouts.dashboard :title="__('Sub Categories')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.sub-categories.index') }}">{{ __('Sub Categories') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    </x-slot:breadcrumb>
    <div class="card card-success">
        <div class="card-header py-2">
            <h3 class="card-title">{{ __('Add') . ' ' . __('Sub Category') }}</h3>
        </div>
        <x-alert />
        <form method="POST" action={{ route('dashboard.sub-categories.store') }} class="m-3" enctype="multipart/form-data"
            onsubmit="return validateMyForm(1);">
            @csrf
            @include('dashboard.sub_categories.zform')
            <x-form.button class="btn-success" displaynam="{{ __('Save') }}" />
        </form>
    </div>
</x-layouts.dashboard>
