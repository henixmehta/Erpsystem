$(document).ready(function() {
    // When a country is selected, load states
    $('#country').change(function() {
        var countryId = $(this).val();
        if (countryId !== '') {
            loadStates(countryId);
            $('#state').prop('disabled', false).html('<option value="">Loading...</option>');
        } else {
            $('#state').prop('disabled', true).html('<option value="">Select State</option>');
            $('#city').prop('disabled', true).html('<option value="">Select City</option>');
        }
    });

    // When a state is selected, load cities
    $('#state').change(function() {
        var stateId = $(this).val();
        if (stateId !== '') {
            loadCities(stateId);
            $('#city').prop('disabled', false).html('<option value="">Loading...</option>');
        } else {
            $('#city').prop('disabled', true).html('<option value="">Select City</option>');
        }
    });

    // Load countries when the page loads
    loadCountries();
});

function loadCountries() {
    $.ajax({
        type: "GET",
        url: "ajax.php",
        data: "action=get_countries",
        success: function(response) {
            $('#country').html(response);
        }
    });
}

function loadStates(countryId) {
    $.ajax({
        type: "GET",
        url: "ajax.php",
        data: "action=get_states&country_id=" + countryId,
        success: function(response) {
            $('#state').html(response);
        }
    });
}

function loadCities(stateId) {
    $.ajax({
        type: "GET",
        url: "ajax.php",
        data: "action=get_cities&state_id=" + stateId,
        success: function(response) {
            $('#city').html(response);
        }
    });
}

