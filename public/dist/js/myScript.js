function validateMyForm(fileNumbers) {
    let validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    let f1 = document.getElementById("image1");
    let warDiv = document.getElementById("waring-div");
    let wartxt = document.getElementById("waring-txt");

    warDiv.style.display = "none";
    if (f1.files.length > 0) {
        if (!validImageTypes.includes(f1.files[0].type)) {
            // alert("Please select image Only for card 1");
            warDiv.style.display = "block";
            wartxt.innerHTML = "Please select image Only for Image"
            return false;
        };
        if (f1.files[0].size > 10 * 1024 * 1024) {
            // alert("Please select size less than 10 MB for card 1");
            warDiv.style.display = "block";
            wartxt.innerHTML = "Please select size less than 10 MB for Image"
            return false;
        };
    };
    if (fileNumbers > 1) {
        let f2 = document.getElementById("image2");
        if (f2.files.length > 0) {
            if (!validImageTypes.includes(f2.files[0].type)) {
                // alert("Please select image Only for card 2");
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select image Only for Image 2"
                return false;
            };
            if (f2.files[0].size > 10 * 1024 * 1024) {
                // alert("Please select size less than 10 MB for card2");
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select size less than 10 MB for Image 2"
                return false;
            };
        };
    };
    if (fileNumbers > 2) {
        let f3 = document.getElementById("image3");
        if (f3.files.length > 0) {
            if (!validImageTypes.includes(f3.files[0].type) && f3.files[0].type !== 'application/pdf') {
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select image Only for Image 3"
                return false;
            };
            if (f3.files[0].size > 50 * 1024 * 1024) {
                warDiv.style.display = "block";
                wartxt.innerHTML = "Please select size less than 10 MB for Image 2"
                return false;
            };
        }
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