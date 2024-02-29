$(document).ready(function() {
    $('#country').change(function() {
        loadState($(this).find(':selected').val());
    });

    $('#state').change(function() {
        loadCity($(this).find(':selected').val());
    });

    // init the countries
    loadCountry();
});

function loadCountry() {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=country"
    }).done(function(result) {
        console.log("Country Response:", result);
        $("#country").append(result);
    });
}

function loadState(countryId) {
    $("#state").children().remove();
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=state&countryId=" + countryId
    }).done(function(result) {
        console.log("State Response:", result);
        $("#state").append(result);
    });
}

function loadCity(stateId) {
    $("#city").children().remove();
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=city&stateId=" + stateId
    }).done(function(result) {
        console.log("City Response:", result);
        $("#city").append(result);
    });
}
