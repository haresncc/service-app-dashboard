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
    <x-tableuuid name="services" :datas="$services" :dataheaders="[ 'name', 'subcategory', 'category','city','confirmed','action']" :fields="[ 'name', ['subcategory', 'name'], ['subcategory','category', 'name'], ['city', 'name'],'confirmed']"
    iconon="fas fa-check" style="color: rgb(74, 211, 41);" iconoff="fas fa-times" style="color: rgb(239, 60, 22);"/>

</x-layouts.dashboard>
