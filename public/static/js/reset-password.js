
$("#form").on('submit',(function(e) {
    App.disableButton("#submitbtn", "<i class=\"fas fa-spinner fa-pulse\"></i> Wait..")
    e.preventDefault();
    // alert('ok');
    var formData = new FormData(this)
    // var value = $("#form").serialize();
    // console.log(formData);
    $.ajax({
        url: "/reset_password",
        type: "POST",
        data:  formData,
        contentType: false,
            cache: false,
        processData:false,
        
        success: function(response) {
            
            
            var data = JSON.parse(response);

            // console.log(data.response);
            
            if(data.error){
                var error = data.error.msg;
                App.alert(error, "#msg-div", "warning");
                

                setTimeout(function(){
                    App.enableButton("#submitbtn", "Submit");
                  }, 1000);

            }else if(data.success){
                console.log(data);
                
                var successMsg = data.success.msg;
                // var successMsg = '<div class="alert alert-success" role="alert"> You can now sign in with your new password.</div>';
                $('#form').slideUp("slow");
                App.alertCustom("success", "Password reset was successful", successMsg + "<br> <a href=\"/\" class=\"btn btn-primary\">Continue</a>", "#resultMsg");
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))