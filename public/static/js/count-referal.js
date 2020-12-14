
$(document).ready(function (){

    var user_infos = user_info();

    var email1 = user_infos.email;
    
    array_id = {
        "email" : email1
    }
    
    // console.log(fullname);

    $.ajax({
        url: "/referal/count",
        type: "POST",
        data:  array_id,
        
            
        
        success: function(response) {
            
            var rs = JSON.parse(response);
            // console.log(response);
            
            $.each(JSON.parse(rs.response.data), function(k, v) {
                $("#referals_count").append("<span>"+v.referal+"</span>");
            });
            // if(data.error){
            // //   console.log(data.error.msg);
            // }else if(data.success){
            //     console.log(data.success.msg);
            // //   $('#form-div').hide();
            // //   $('#success-card').slideDown("slow");
            // //   $('#form')[0].reset();
            // }	
        },
        error: function(e) {
        // console.log(response);
    
        }          
    });
});