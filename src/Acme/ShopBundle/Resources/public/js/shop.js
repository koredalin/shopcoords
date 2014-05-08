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
    request['search_option']= $('input[type="radio"][name="search_option"]:checked').val();
    
    console.log(link);
    console.log('longitude: '+request['longitude']);
    console.log('latitude: '+request['latitude']);
    console.log('radius: '+request['radius']);
    console.log('radius: '+request['search_option']);
    
    $.post( link, request)
  .done(function( data ) {
      var str_result='';
      str_result=JSON.stringify(data);
      $('#show_result').html('<p>' + str_result + '</p>');
      
      
    // console.log( "Data Loaded: " + data );
  });
    
    
    
}