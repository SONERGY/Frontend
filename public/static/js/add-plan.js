function editPlan(id) {
  // alert(id);
  $('#editModal').trigger('click');

  var values = id.split('_');
  var two = values[1];

  var planName = $('#planName_' + two).text();
  var planDuration = $('#planDuration_' + two).text();
  var planAmount = $('#planAmount_' + two).text();
  // console.log(t_row);
  $('#available_plans').val(planName);
  $('#survey_plan').val(planName);
  $('#survey_duration').val(planDuration);
  $('#survey_amount').val(planAmount);
}

function deletePlan(id) {
  App.disableButton('#' + id, '<i class="fas fa-spinner fa-pulse"></i> Wait..');
  // e.preventDefault();

  var values2 = id.split('_');
  var two2 = values2[1];

  array_id = {
    main_id: two2
  };
  // console.log(array_id);

  $.ajax({
    url: '/plans/delete',
    type: 'POST',
    data: array_id,

    success: function(response) {
      //   console.log(response);

      var data = JSON.parse(response);

      // console.log(data);
      if (data.error) {
        // console.log(data.error.msg);
        // var error = data.error.msg;
        // setTimeout(function() {
        //   enableButton(id);
        // }, 1000);
      } else if (data.success) {
        // console.log(data.success.msg);
        var error = data.success.msg;

        $('#planrow_' + two2).slideUp();
        //   $('#success-card').slideDown("slow");
        //   $('#form')[0].reset();
        // setTimeout(function(){
        //   enableButton(id);
        // }, 1000);
      }
    },
    error: function(e) {
      // console.log(response);
    }
  });
}

function editPlan(id) {
  // alert(id);
  $('#editModal').trigger('click');

  var values = id.split('_');
  var two = values[1];

  var planName = $('#planName_' + two).text();
  var planDuration = $('#planDuration_' + two).text();
  var planAmount = $('#planAmount_' + two).text();
  // console.log(t_row);
  $('#available_plans').val(planName);
  $('#survey_plan').val(planName);
  $('#survey_duration').val(planDuration);
  $('#survey_amount').val(planAmount);
}

function addPlan() {
  // alert(id);
  $('#editModal').trigger('click');

  $('#available_plans').val('newplan');
}

$('#add-plan').on('submit', function(e) {
  App.disableButton(
    '#add-btn',
    '<i class="fas fa-spinner fa-pulse"></i> Wait..'
  );
  e.preventDefault();
  // var formData = new FormData(this)
  var value = $('#add-plan').serialize();
  console.log(value);
  $.ajax({
    url: '/plans/submit',
    type: 'POST',
    data: value,
    // contentType: false,
    //     cache: false,
    // processData:false,

    success: function(response) {
      var data = JSON.parse(response);

      console.log(data);

      if (data.error) {
        var error = data.error.msg;
        // App.alert(error, "#warningMsg", "warning");
        App.alert(error, '#msg-div', 'warning');

        setTimeout(function() {
          App.enableButton('#add-btn', 'Add <i class="fa fa-plus"></i>');
        }, 1000);
      } else if (data.success) {
        var error = data.success.msg;
        App.alert(error, '#msg-div', 'success');

        // $("#msg-div").html(successMsg).fadeIn("slow");
        $('#add-plan')[0].reset();
        setTimeout(function() {
          location.reload();
        }, 1500);
      }
    },
    error: function(e) {}
  });
});
