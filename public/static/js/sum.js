$(document).ready(function() {
  // console.log(fullname);

  $.ajax({
    url: '/sum',
    type: 'POST',
    // data:  array_id,

    success: function(response) {
      var rs = JSON.parse(response);
      // console.log(response);

      $.each(JSON.parse(rs.response.data), function(k, v) {
        if (v.type == 'NGN') {
          $('#referal_bal').append(v.amount);
          // console.log(v.amount);
        } else {
          $('#sngy').append(v.amount);
          // console.log(v.amount);
        }
      });
    },
    error: function(e) {
      // console.log(response);
    }
  });
});
