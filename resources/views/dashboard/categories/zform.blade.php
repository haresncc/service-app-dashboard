<div class="form-row">
    <x-form.input name="name" :value="$category->name ?? ''" displaynam="Arabic Name" required  size="4" autocomplete="off"/>
    <x-form.input name="name_en" :value="$category->name_en ?? ''" displaynam="English Name" required  size="4"/>
</div>

<div class="form-row">
    <x-form.inputfile name="image1" displaynam="Image1" size=4 :value="$category->image ?? ''" onchange="readURL(this)" accept="image/*" />  
    <x-form.select name="active" :selected="$category->active ?? ''" displaynam="Active" :options="$activeAr" size="3" :blankitem="false"/>    
</div>
<x-waring />

@push('custom-scripts')
<script src="{{ asset('dist/js/myScript.js') }}"></script>
@endpush
