$(document).ready(function() {
    $('#calc_btn').on('click', function(){
        getShopsInArea();
    });
});

function getShopsInArea() {
    var request = {};
    var link = $("#calc_shops_path").val();
    var radius = 0;
    
    request['longitude']=$("#longitude").val();    
    request['latitude']=$('input#latitude').val();
    request['radius']=$('input#radius').val();
    
    console.log(link);
    
    $.post( link, request)
  .done(function( data ) {
    console.log( "Data Loaded: " + data );
  });
    
    
    
}