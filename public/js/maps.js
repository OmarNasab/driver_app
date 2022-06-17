function initialize() {

    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];
        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

        const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 13
        });
        const marker = new google.maps.Marker({
            map: map,
            position: {lat: latitude, lng: longitude},
        });

        marker.setVisible(isEdit);

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;
        autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    }

    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;
        const map = autocompletes[i].map;
        const marker = autocompletes[i].marker;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });

            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

        });
    }
}

function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
}



$("#addPlace").on("submit",function (e){
    e.preventDefault()
    $("#stops").removeClass("hidden")
    $("#places").append("" +
        "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 place'>" +
        "<th scope='row' class='px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap name'>" +
        $("#address-input").val() +
        "</th>" +
        " <td class='px-6 py-4 long'>" +
        $("#address-longitude").val() +
        "</td>" +
        "<td class='px-6 py-4 lat'>" +
        $("#address-latitude").val() +
        "</td>" +
        "<td class='px-6 py-4 text-right'>" +
        "<button onclick='deletePlace(this)' class='font-medium text-picton-blue dark:text-blue-500 hover:underline deletePlace'>Delete</button>"+
        "</td>" +
        "</tr>")
    $("#address-input").val("")

})
function deletePlace(e){
    e.parentNode.parentNode.remove()
    if(!$("#places").children().length){
        $("#stops").addClass("hidden")
    }
}

$("#savePlace").on("submit",function (e){
    e.preventDefault()
    let json=[]
    let user=$("#supervisor").val()
    let token=$("input[name='_token']").val()
    let driver=$("#driver_name").val()
    let description=$("#description").val()
    for(let i=0;i<$(".place").length;i++){
        let place={
            "name":$(".name:eq("+i+")").text(),
            "lat":$(".lat:eq("+i+")").text(),
            "long":$(".long:eq("+i+")").text(),
        }
        console.log(place)
        json.push(place)
    }

    let formData={
        "_token":token,
        "supervisor":user,
        "driver_id":driver,
        "description":description,
        "places":json
    }
    $.ajax(
        {
            type:"POST",
            url:"https://kgc-drivers.com/mission/ajax_store",
            data:JSON.stringify(formData),
            contentType: "application/json; charset=utf-8",
            success:function (){
                window.location.href = "https://kgc-drivers.com/mission";
            }
        }
    )

})
