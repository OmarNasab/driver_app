function initialize() {

    $('form').on('keyup keypress', function (e) {
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


$("#addPlace").on("submit", function (e) {
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
        "<button onclick='deletePlace(this)' class='font-medium text-picton-blue dark:text-blue-500 hover:underline deletePlace'>Delete</button>" +
        "</td>" +
        "</tr>")
    $("#address-input").val("")

})

function deletePlace(e) {
    e.parentNode.parentNode.remove()
    if (!$("#places").children().length) {
        $("#stops").addClass("hidden")
    }
}

$("#savePlace").on("submit", function (e) {
    e.preventDefault()
    let json = []
    let user = $("#supervisor").val()
    let token = $("input[name='_token']").val()
    let driver = $("#driver_name").val()
    let vehicle = $("#vehicle_name").val()
    let description = $("#description").val()
    for (let i = 0; i < $(".place").length; i++) {
        let place = {
            "name": $(".name:eq(" + i + ")").text(),
            "lat": $(".lat:eq(" + i + ")").text(),
            "long": $(".long:eq(" + i + ")").text(),
        }
        json.push(place)
    }
    let invoices_id = []
    let recipient_name = []
    let invoices = []

    $("input[name='invoice_id[]']").each(function () {
        invoices_id.push($(this).val())
    })
    $("input[name='recipient_name[]']").each(function () {
        recipient_name.push($(this).val())
    })
    for (let i = 0; i < invoices_id.length; i++) {
        invoices.push({"invoice_id": invoices_id[i], "recipient_name": recipient_name[i]})
    }

    console.log()
    let formData = {
        "_token": token,
        "supervisor": user,
        "driver_id": driver,
        "vehicle_id": vehicle,
        "description": description,
        "places": json,
        "invoices": invoices
    }
    $.ajax(
        {
            type: "POST",
            url: "https://kgc-drivers.com/mission/ajax_store",
            data: JSON.stringify(formData),
            contentType: "application/json; charset=utf-8",
            success: function () {
                window.location.href = "https://kgc-drivers.com/mission";
            }
        }
    )
})

var invoiceNumber = 1;

$("#type").on("change", function (e) {
    let value = e.target.value;
    let invoicesElement = $("#invoices")
    if (value === "delivery") {
        $("#invoice_id").prop('required', true);
        $("#recipient_name").prop('required', true);
        invoicesElement.removeClass("hidden")
    } else {

        $("#invoice_id").prop('required', false);
        $("#recipient_name").prop('required', false);

        if (invoicesElement.children().length > 1) {
            for (let i = 1; i < invoicesElement.children().length;) {
                invoicesElement.children()[i].remove()
            }
            addAddButton()
        }
        invoicesElement.addClass("hidden")
    }
})

function addInvoice(e) {
    let invoice_info = `<div class="grid grid-cols-5 gap-2" id="invoice_info_${invoiceNumber}">
                        <div class="mb-6 col-span-2">
                            <label for="invoice_id_${invoiceNumber}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Invoice Number</label>
                            <input type="text" id="invoice_id_${invoiceNumber}" name="invoice_id[]" class="w-full rounded-md shadow-sm border-gray-300 focus:border-picton-blue focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required/>
                        </div>
                        <div class="mb-6 col-span-2">
                            <label for="recipient_name_${invoiceNumber}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Recipient Name</label>
                            <input type="text" id="recipient_name_${invoiceNumber}" name="recipient_name[]" class="w-full rounded-md shadow-sm border-gray-300 focus:border-picton-blue focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required/>
                        </div>
                        <div class="mb-6 col-span-1">
                            <button  type="button" id="add" onclick="addInvoice(this)"
                                     class="text-gray-500 mt-7 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Add
                            </button>
                            <button  type="button" id="delete_${invoiceNumber}" onclick="deleteInvoice(this)"
                                     class="text-white disabled:opacity-25 disabled:hover:bg-red-500 bg-red-500 mt-7 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Delete
                            </button>
                        </div>
                    </div>`
    $("#invoices").append(invoice_info)
    e.remove()
    invoiceNumber++
}

function deleteInvoice(e) {
    let id = e.id
    id = id.replace("delete_", "")
    id = parseInt(id)


    if (id === invoiceNumber - 1) {
        for (let i = invoiceNumber - 2; i >= 0; i--) {
            let checkDelete = document.getElementById(`delete_${i}`)
            console.log(checkDelete)
            if (checkDelete) {
                $(`#delete_${i}`).parent().prepend(button)
                invoiceNumber = i + 1
                break;
            }
            if (i === 0) {
                addAddButton()
            }
        }
    }
    e.parentElement.parentElement.remove()
}

function addAddButton() {
    let button = `<button  type="button" id="add" onclick="addInvoice(this)"
                                     class="text-gray-500 mt-7 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Add
                            </button>`
    $(`#delete`).parent().prepend(button)
    invoiceNumber = 1
}
