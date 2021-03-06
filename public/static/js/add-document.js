$('#document-form').on('submit', function(e) {
  e.preventDefault();
  App.disableButton(
    '#uppload2',
    '<i class="fas fa-cog fa-spin"></i> Saving...'
  );
  // var value = $("#all-info").serialize();
  var formData = new FormData(this);
  // alert('ok');

  // fakepath\

  var img_update = $('#2i-file-upload').val();

  if (img_update === '') {
    App.alert('Please provide a profile picture', '#2msg-div', 'danger');
    App.enableButton('#uppload2', 'Submit');
  } else {
    $.ajax({
      url: '/kyc/document',
      type: 'POST',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,

      success: function(response) {
        // console.log(response);
        var data = JSON.parse(response);

        // console.log(data);
        if (data.error) {
          console.log(data.error.msg);
          App.alert(data.error.msg, '#2msg-div', 'danger');
          App.enableButton('#uppload2', 'Submit');
        } else if (data.success) {
          // console.log(data.status);
          App.alert(data.success.msg, '#2msg-div', 'success');
          App.enableButton('#uppload2', 'Submit');
          // $('#all-info')[0].reset();
          window.location.reload();
        }
      },
      error: function(e) {}
    });
  }
});
