$(document).ready(function() {
    $('#calc_btn').on('click', function(){
        getShopsInArea();
    });
});

function getShopsInArea() {
    var longitude=0;
    var latitude=0;
    var radius=0;
    
    longitude=$("input#longitude").val();    
    latitude=$('input#latitude').val();
    radius=$('input#calc_shops_path').val();
    
    console.log('longitude: '.latitude);
    console.log('longitude: '.radius);
}