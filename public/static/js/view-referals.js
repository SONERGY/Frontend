
$(document).ready(function (){

    var user_infos = user_info();

    var email1 = user_infos.email;
    
    array_id = {
        "email" : email1
    }
    
    // console.log(array_id);

    $.ajax({
        url: "/referal/",
        type: "POST",
        data:  array_id,
        // contentType: false,
        //     cache: false,
        // processData:false,
        
            
        
        success: function(response) {
            
            var rs = JSON.parse(response);
            // console.log(rs);
            
            // $.each(JSON.parse(rs.response.data), function(k, v) {
            //     $("#referals_count").append("<span>"+v.referal+"</span>");
            // });
            if(data.error){
            //   console.log(data.error.msg);
            }else if(data.success){
                // console.log(data.success.msg);
           
            }	
        },
        error: function(e) {
        // console.log(response);
    
        }          
    });
});