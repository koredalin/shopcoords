$(document).ready(function() {
    $('#calc_btn').on('click', function(){
        getShopsInArea();
    });
});

function getShopsInArea() {
    var request = {};
    var link = $("#calc_shops_path").val();
    
    request['longitude']=$("#longitude").val();    
    request['latitude']=$('#latitude').val();
    request['radius']=$('#radius').val();
    request['client_id']=$('#client_id').val();
    
    console.log(link);
    console.log('longitude: '+request['longitude']);
    console.log('latitude: '+request['latitude']);
    console.log('radius: '+request['radius']);
    
    $.post( link, request)
  .done(function( data ) {
    // console.log( "Data Loaded: " + data );
  });
    
    
    
}