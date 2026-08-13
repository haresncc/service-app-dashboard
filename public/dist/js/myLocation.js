function getLoaction() {
    if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {
        enableHighAccuracy: true, // Uses GPS if available for better precision
        timeout: 7000,            // Time to wait for a response (in ms)
        maximumAge: 0             // Forces the browser to get a fresh location
    });
    } else {
    console.log("Geolocation is not supported by this browser.");
    }
}

// Success callback function Location
function successCallback(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    
    //   const googleMapsUrl = `https://google.com{latitude},${longitude}`;
    //   const openStreetMapUrl = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
    document.getElementById('latitude').value=latitude;
    document.getElementById('longitude').value=longitude;
}

    // Error callback function Location
function errorCallback(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
        console.error("User denied the request for Geolocation.");
        break;
        case error.POSITION_UNAVAILABLE:
        console.error("Location information is unavailable.");
        break;
        case error.TIMEOUT:
        console.error("The request to get user location timed out.");
        break;
        case error.UNKNOWN_ERROR:
        console.error("An unknown error occurred.");
        break;
    }
}

function updateLocation() {
    if(document.getElementById("update-location").checked) {
        getLoaction();
    }
}