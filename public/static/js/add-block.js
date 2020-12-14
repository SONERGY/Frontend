function addToBlock(id){
    // alert(id);
    var neet = id.split("-");
    var intId = neet[0];
    // var varId = neet[1];
    array_id = {
        "main_id" : intId
    }
    $('#'+id).attr("disabled", "disabled");
	$('#'+id).html('<i class="fa fa-cog fa-spin fa-lg"></i>');
  
    $.ajax({
          url: "/add_block/",
          type: "POST",
          data:  array_id,
         
              
          
          success: function(response) {
  
              console.log(response);
  
              var data = JSON.parse(response);
              
              // console.log(data);
              if(data.error){
                  // console.log(data.error.msg);
                  var error = data.error.msg;
                                   
  
              }else if(data.success){
                  // console.log(data.success.msg);
                  var error = data.success.msg;
                                    
                  $('#'+id).slideUp();
                
                  
              }	
          
          },
          error: function(e) {
            // console.log(response);
      
          }          
      });
  }