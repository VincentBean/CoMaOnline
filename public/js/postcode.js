$('#street_name').focusin(function() {

    $('#city_loader').removeClass('d-none')
    $('#street_loader').removeClass('d-none')

    var postcode = $('#zipcode').val();
    var number = $('#house_number').val();
    var getUrl = window.location;
    var url = getUrl.protocol + "//" + getUrl.host + "/api/address/" + postcode + "/" + number;

    console.log(url);

    $.ajax({
        url: url,
        type: "get", //send it through get method
        dataType: 'json',
        success: function(response) {
            console.log(response)
            $('input[name=street_name]').val(response.street);
            $('input[name=city]').val(response.city);
            $('input[name=province]').val(response.province);

            $('#city_loader').addClass('d-none')
            $('#street_loader').addClass('d-none')
        },
        error: function(xhr) {
            console.log(xhr)
            $('#city_loader').addClass('d-none')
            $('#street_loader').addClass('d-none')
        }
    });
});