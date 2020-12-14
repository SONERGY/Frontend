$(document).ready(function() {
  $.ajax({
    url: '/plans/fetch',
    type: 'POST',
    //   data:  array_id,

    success: function(response) {
      var rs = JSON.parse(response);
      // console.log(rs);

      var main = rs.response.data;
      // console.log(main);

      if (rs.response.data.length == 0) {
        console.log('empty');
      } else {
        // var listItems =
        // '<option selected="selected" value="">Select Plan</option>';
        var count = 1;
        $.each(JSON.parse(main), function(k, v) {
          rowbody =
            '<tr id="planrow_' +
            v.id +
            '"> <td class="text-center">' +
            count++ +
            '</td> <td class="text-center" id="planName_' +
            v.id +
            '">' +
            v.name +
            '</td> <td class="text-center" id="planDuration_' +
            v.id +
            '">' +
            v.duration +
            '</td> <td class="text-center" id="planAmount_' +
            v.id +
            '">' +
            parseInt(v.amount) +
            '</td> <td><button type="button" id="plan_' +
            v.id +
            '" class="btn text-white btn-primary" onclick="editPlan(this.id);">Edit Plan</button><button type="button" id="deletePlan_' +
            v.id +
            '" class="btn text-white btn-danger ml-3" onclick="deletePlan(this.id);">Delete Plan</button></td> </tr>';
          $('#table-body').append(rowbody);
        });
        // $('#available_plans').html(listItems);
        // console.log(amount);
      }

      if (response.error) {
        //   console.log(data.error.msg);
      } else if (response.success) {
        // console.log(response.success.msg);
        //   $('#form-div').hide();
        //   $('#success-card').slideDown("slow");
        //   $('#form')[0].reset();
      }
    },
    error: function(e) {
      // console.log(response);
    }
  });
});
