$(document).ready(function() {
  var user_infos = user_info();

  var email1 = user_infos.email;

  array_id = {
    email: email1
  };

  // console.log(fullname);

  $.ajax({
    url: '/count_stat',
    type: 'POST',
    data: array_id,

    success: function(response) {
      var rs = JSON.parse(response);
      // console.log(response);

      $.each(JSON.parse(rs.response.data), function(k, v) {
        $('#completed_surv').append(v.completed);
        $('#mySurv').append(v.mySurv);
        $('#validSurv').append(v.validSurv);
        $('#referals_count').append(v.referal);
      });
    },
    error: function(e) {
      // console.log(response);
    }
  });
});
