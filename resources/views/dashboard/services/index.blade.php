<x-layouts.dashboard :title="__('Services')">
    <x-slot:breadcrumb>
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard.services.index') }}">{{ __('Services') }}
            </a>
        </li>
    </x-slot:breadcrumb>
        <x-slot:btn>
            <a class="btn btn-success px-4" href="{{ route('dashboard.services.create') }}">{{ __('Create') }}</a>
        </x-slot:btn>
    <x-alert />
    <form action="{{ URL::current() }}" method="get" class="form-sm">
        <div class="form-row">
            <x-form.select name="category_id" :selected="request('category_id')" :options="$categories" :label="false" />
            <x-form.select name="sub_category_id" :selected="request('sub_category_id')" :options="$subCategories" :label="false" />
            <x-form.input name="name" :value="request('name')" displaynam="Service Name" size=3 :label="false" />
            <x-form.button usedfor="filter" displaynam="{{ __('Filter') }}" size=1 />
        </div>
    </form>
    <x-table name="services" :datas="$services" :dataheaders="['id', 'name', 'subcategory', 'category','city']" :fields="['id', 'name', ['subcategory', 'name'], ['subcategory','category', 'name'], ['city', 'name']]" />

</x-layouts.dashboard>
