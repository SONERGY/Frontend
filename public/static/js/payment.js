function payWithPaystack() {
  var user_infos = user_info();

  var user_email = user_infos.email;
  console.log(user_email, 'The email');

  App.disableButton(
    '#payWithPaystack',
    '<i class="fas fa-cog fa-spin"></i> Wait..'
  );
  var handler = PaystackPop.setup({
    key: 'pk_test_e032babb6ec4d5f4a0d5f649f514ce13d0f91aad',
    //   driver_id: $("#driver_id").val(),
    email: user_email,
    type: $('#paymenttype').val(),
    amount: parseFloat($('#amount').val() + '00'),
    currency: 'NGN',
    callback: function(response) {
      console.log(response);

      // var typeofpayment = "referal";

      var value = 'message=' + response.message + '';
      //value += '&redirecturl='+response.redirecturl+'';
      value += '&reference=' + response.reference + '';
      value += '&response=' + response.message + '';
      value += '&status=' + response.status + '';
      value += '&trans=' + response.trans + '';
      value += '&trxref=' + response.trxref + '';
      value += '&paymenttype=' + $('#paymenttype').val() + '';
      value += '&cause_id=' + $('.cause_id').val() + '';
      value += '&email=' + user_email + '';
      value += '&amount=' + $('#amount').val() + '';

      // console.log(value);

      //value = 'amount='+response.message+'';
      console.log(value);

      $.ajax({
        url: '/payment',
        type: 'POST',
        data: value,
        success: function(response) {
          var data = JSON.parse(response);
          console.log(data);

          if (data.success.status == 'OK') {
            creation_stage = '10';
            App.setStep(creation_stage);
            var html_var =
              '<div><p>Your payment was successful</p><a class="btn btn-danger btn-sm" href="/account/">Close</a></div>';
            App.alertCustom(
              'success',
              'Payment',
              html_var,
              '#payment-referral-dailog'
            );

            // var publish = '<div class="text-center"><h5>Reprehenderit  dolor nisi consequat commodo laborum non cupidatat qui adipisicing. Duis aliqua ad dolore ut officia. Ut duis adipisicing Lorem aliquip incididunt quis.</h5><div class="form-group"><button type="button" id="proceed-publish" onclick="trigaPublish(this.id);" class="btn btn-success roundy shadow-sm">Proceed to publish <i class="fa fa-arrow-right"></i></button></div></div>'

            $('#makepayment').slideUp();
            $('#makepublish').show();

            $('#notPublish').remove();
            $('#publishDiv').show();

            // toastMessage("Success", "Your payment was successful", 'success', "slide");
            // window.location.replace("/account/");
          } else {
            // console.log(data.error);
            toastMessage('Error', data.error.msg, 'error', 'slide');
            alert('bad');
          }
          // you will get response from your php page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
          //console.log(textStatus, errorThrown);
        }
      });
    },
    onClose: function() {}
  });
  handler.openIframe();
}
