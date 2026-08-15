<x-layouts.dashboard :title="__('Categories')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.categories.index') }}">{{ __('Categories') }}
            </a>
        </li>
        <li class="breadcrumb-item active">{{ __('Edit') }}</li>
    </x-slot:breadcrumb>
    <div class="card card-primary">
        <div class="card-header py-2">
            <h3 class="card-title">{{ __('Edit') . ' ' . __('Category') }}</h3>
        </div>
        <x-alert />
        <form method="POST" action={{ route('dashboard.categories.update', $category->id) }} class="m-3" enctype="multipart/form-data"
            onsubmit="return validateMyForm(1);">
            @csrf
            @method('PUT')
            @include('dashboard.categories.zform')
            <x-form.button class="btn-primary" displaynam="{{ __('Update') }}" />
        </form>
    </div>
</x-layouts.dashboard>
