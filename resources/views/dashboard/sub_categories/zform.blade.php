<div class="form-row">
    <x-form.select name="category_id" :selected="$subCategory->category_id ?? ''" displaynam="Category" :options="$categories" required size="3" onchange="fillSubCategories()"/>
    <x-form.input name="name" :value="$subCategory->name ?? ''" displaynam="Arabic Name" required  size="4" autocomplete="off"/>
    <x-form.input name="name_en" :value="$subCategory->name_en ?? ''" displaynam="English Name" required  size="4"/>
</div>

<div class="form-row">
    <x-form.inputfile name="image1" displaynam="Image1" size=4 :value="$subCategory->image ?? ''" onchange="readURL(this)" accept="image/*" />  
    <x-form.select name="excat_location" :selected="$subCategory->excat_location ?? ''" displaynam="Excat Location" :options="$excatLocationAr" size="3"/>    
    <x-form.select name="active" :selected="$subCategory->active ?? ''" displaynam="Active" :options="$activeAr" size="3"/>    
</div>
<x-waring />

@push('custom-scripts')
<script src="{{ asset('dist/js/myScript.js') }}"></script>
@endpush
