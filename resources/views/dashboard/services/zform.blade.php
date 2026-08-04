<div class="form-row">
    <x-form.select name="category_id" :selected="$service->subcategory->category_id ?? ''" displaynam="Category" :options="$categories" required size="4" onchange="fillSubCategories()"/>
    <x-form.select name="sub_category_id" :selected="$service->sub_category_id ?? ''" displaynam="SubCategory" :options="[]" required  size="4"/>
    <x-form.input name="name" :value="$service->name ?? ''" displaynam="Service Name" required  size="4"/>
</div>
<div class="form-row">
    <x-form.select name="city_id" :selected="$service->city_id ?? ''" displaynam="City" :options="$cities" required  size="4"/>
     <x-form.input name="phone_number" :value="$service->phone_number ?? ''" displaynam="phone_number" size=3 />   
    <x-form.inputfile name="image1" displaynam="Card1" size=4 :value="$service->image ?? ''" onchange="readURL(this)"
        accept="image/*" />
        
</div>
<x-waring />

@push('custom-scripts')
<script>
    window.onload = function() {
        if(document.getElementById("category_id").value !='') {
            fillSubCategories();
        };
    };
    function fillSubCategories() {
        let subCatgoriesElement =document.getElementById("sub_category_id");
        const selectedCategory=document.getElementById("category_id").value;
        const service = {{ Illuminate\Support\Js::from($service ?? null) }};
        const categories = {{ Illuminate\Support\Js::from($categories ?? null) }};
        const subcategoriesList = categories.filter(
                (category) => category.id == selectedCategory,
                )[0].sub_categories;
        // console.log(service === null,selectedCategory,categories,subcategoriesList);
        subCatgoriesElement.innerHTML = "";

        let el = document.createElement("option");
        subCatgoriesElement.appendChild(el);
        subcategoriesList.forEach((element, index, array) => {
            let el = document.createElement("option");
            el.textContent = element.name;
            el.value = element.id;
            subCatgoriesElement.appendChild(el);
        });
        const currentSubCategory = {{ Illuminate\Support\Js::from($service->sub_category_id ?? null) }};
        if(currentSubCategory != null) {
            subCatgoriesElement.value=currentSubCategory;
        }
       
        const oldSubCategory = {{ Illuminate\Support\Js::from(old('sub_category_id') ?? null) }};
        if(oldSubCategory != null) {
            subCatgoriesElement.value=oldSubCategory;
        }
    }

    function validateMyForm() {
        let validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
        let f1 = document.getElementById("image1");
        let warDiv = document.getElementById("waring-div");
        let wartxt = document.getElementById("waring-txt");

        warDiv.style.display = "none";
        if (f1.files.length > 0) {
            if (!validImageTypes.includes(f1.files[0].type)) {
                // alert("Please select image Only for card 1");
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select image Only for card 1"
                return false;
            };
            if (f1.files[0].size > 10 * 1024 * 1024) {
                // alert("Please select size less than 10 MB for card 1");
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select size less than 10 MB for card 1"
                return false;
            };
        };
       
        return true;
    };

    function readURL(input) {
        let imgShow = document.querySelector('#' + input.id + '-divshow img');
        let imgShowDiv = document.querySelector('#' + input.id + '-divshow');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (imgShow !== null) {
                    imgShow.setAttribute("src", e.target.result);
                };
                imgShowDiv.style.visibility = "visible";
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            if (imgShow !== null) {
                imgShow.setAttribute("src", '');
            };
            imgShowDiv.style.visibility = "hidden";
        }
    }
</script>

@endpush
