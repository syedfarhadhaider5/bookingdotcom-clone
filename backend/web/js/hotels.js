var hotel = document.getElementById('hotels-address');
if(hotel !== null){
    var autocomplete = new google.maps.places.Autocomplete(hotel);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place);
        console.log(place.name);
        var hotelName = place.name;
        var lat = place?.geometry?.location?.lat();
        var lng = place?.geometry?.location?.lng();
        // get country and ccity
        let html = place.adr_address;
        const tempElement = document.createElement('div');
        tempElement.innerHTML = html;
        // Use DOM methods to extract the content from each span tag
        const countryNameElem = tempElement.querySelector('.country-name');
        // Check if the elements exist before accessing their text content
        const countryName = countryNameElem ? countryNameElem.textContent : '';
        // Log the extracted content to the console
        var country = countryName;//` ${countryName}`;
        document.getElementById('hotels-name').value = hotelName;
        document.getElementById('hotels-lat_location').value = lat;
        document.getElementById('hotels-long_location').value = lng;
        document.getElementById('hotels-country').value = countryName;
    });
}

$(function () {
    // $("#example1").DataTable({
    //     "responsive": true,
    //     "autoWidth": false,
    // });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});