$('#validateSurvey').click(function(event) {
  event.preventDefault();
  App.disableButton(
    '#validateSurvey',
    '<i class="fas fa-cog fa-spin"></i> Validating...'
  );

  id_array = {
    user_id: $('#user_id').val(),
    survey_id: $('#survey_id').val(),
    amount: $('#amount').val()
  };
  // console.log(id_array);
  $.ajax({
    url: '/validation/valid',
    type: 'POST',
    data: id_array,

    success: function(response) {
      var data = JSON.parse(response);

      if (data.error) {
        var error = data.error.msg;
        // App.alert(error, '#msg-div', 'warning');

        console.log(data);
        setTimeout(function() {
          App.enableButton('#validateSurvey', 'Validate');
        }, 1000);
      } else if (data.success) {
        $('#validateSurvey').removeClass('btn-primary');
        $('#validateSurvey').addClass('btn-success');
        $('#validateSurvey').html('Validated <i class="fa fa-check"></i>');
        // var successMsg = data.success.msg;

        var url = window.location.href;

        var values = url.split('/answers/');

        var two = values[1].split('2358');

        setTimeout(function() {
          window.location.replace('/validation/views/' + two[0]);
        }, 1000);
      }
    },
    error: function(e) {}
  });
});
