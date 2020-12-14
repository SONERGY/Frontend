$('#usernameForm').on('submit', function(e) {
  App.disableButton(
    '#updateUsername',
    '<i class="fas fa-spinner fa-pulse"></i> Wait..'
  );
  e.preventDefault();
  // alert('ok');
  var formData = new FormData(this);
  // var value = $("#form").serialize();
  // console.log(formData);
  $.ajax({
    url: '/kyc/change_username',
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,

    success: function(response) {
      var data = JSON.parse(response);

      // console.log(data.response);

      if (data.error) {
        var error = data.error.msg;

        console.log(error);

        App.alert(error, '#warningMsg2', 'warning');

        setTimeout(function() {
          App.enableButton('#updateUsername', 'Update Username');
        }, 1000);
      } else if (data.success) {
        // var error = data.success.msg;
        var successMsg =
          '<div class="alert alert-success" role="alert"> You can now sign in with your new password.</div>';
        $('#form').slideUp('slow');
        App.alertCustom(
          'success',
          'Change of password was successful',
          successMsg,
          '#resultMsg'
        );

        // $("#contact").html(error).fadeIn("slow");
        // // $("#listbody").slideUp()
        // $("#form2")[0].reset();
        setTimeout(function() {
          // enableButton(id);
          window.location.reload();
        }, 5000);
      }
    },
    error: function(e) {}
  });
});
