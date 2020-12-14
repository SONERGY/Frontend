$(document).ready(function() {
  // console.log(fullname);

  $.ajax({
    url: '/amount_stat',
    type: 'POST',
    // data:  array_id,

    success: function(response) {
      var rs = JSON.parse(response);
      // console.log(response);

      $.each(JSON.parse(rs.response.data), function(k, v) {
        var am_sp = v.am_sp.split('.');
        var res1 = am_sp[0];
        var surv_rw = v.surv_rw.split('.');
        var res2 = surv_rw[0];
        var am_sp = v.am_sp.split('.');
        var res3 = am_sp[0];

        $('#am_sp').append(res1);
        $('#surv_rw').append(res2);
        $('#valid_rw').append(res3);
      });
    },
    error: function(e) {
      // console.log(response);
    }
  });
});
