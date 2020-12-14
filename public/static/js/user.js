$('#user_login_form').submit(function(event) {
  event.preventDefault();
  App.disableButton(
    '#login_trigger_button',
    '<i class="fas fa-cog fa-spin"></i> Authenticating...'
  );
  // disabledBtn("posting...", "dynamicBtnSubmitForm");
  // disabledBtn("posting...", "dynamicBtnSubmitForm2");
  var values = $('#user_login_form').serialize();

  $.ajax({
    url: '/authentication/user_auth',
    type: 'POST',

    data: values,
    success: function(response) {
      console.log(response);
      App.enableButton('#login_trigger_button', 'Login');
      var data = JSON.parse(response);
      //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
      // console.log(data.error);
      if (data.success) {
        if (data.user_data) {
          var user_info = {
            user_id: data.user_data.id,
            user_type: data.user_data.user_type,
            user_user_name: data.user_data.user_name,
            user_email: data.user_data.email,
            user_profile_img: data.user_data.profile_img,
            user_document: data.user_data.document,
            user_auth_code: data.user_data.email_auth_code,
            user_has_paid: data.user_data.has_paid,
            user_status: data.user_data.status,
            user_create_at: data.user_data.create_at,
            user_update_at: data.user_data.update_at
          };

          var storage_save = localStorage.setItem(
            'user_info',
            JSON.stringify(user_info)
          );

          if (typeof localStorage.user_info !== 'undefined') {
            // console.log(user_info);

            var usertype = data.user_data.user_type;

            if (usertype === 'admin') {
              window.location.replace('/tagapanga/');
            } else {
              window.location.replace('/account/');
            }
            // window.location.replace('/account/');
          } else {
            alert('nothing Saved');
          }
        } else {
          alert('No user came and conquered');
        }
      } else if (data.error) {
        // console.log(data.error);

        App.alert(data.error.msg, '#msg-div', 'danger');

        if (data.error.msg.status == 'INACTIVE') {
          App.alert(
            '<div> ' +
              data.error.msg.msg +
              ' <button type="button" id="resend" class="text-success font-weight-bold">Resend activation email</button></div>',
            '#msg-div',
            'danger'
          );

          $('#resend').on({
            click: function(e) {
              App.disableButton(
                '#resend',
                '<i class="fas fa-cog fa-spin"></i> Resending...'
              );

              $.ajax({
                url: '/authentication/reauthenticate',
                type: 'POST',

                data: values,
                success: function(response) {
                  App.enableButton('#resend', 'Resend activation email');

                  var data = JSON.parse(response);
                  //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
                  console.log(response);

                  if (data.success) {
                    // $("#user_register_form").hide();
                    // $("#success_div").show();
                    // alert('ok');
                    App.alert(data.success.msg, '#msg-div', 'success');
                  } else if (data.error) {
                    App.alert(data.error.msg, '#msg-div', 'danger');
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  // console.log(textStatus, errorThrown);
                  App.enableButton('#resend', 'Resend activation email');
                }
              });
              return false;
            }
          });
        }
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // console.log(textStatus, errorThrown);
      App.enableButton('#login_trigger_button', 'Login');
    }
  });
  return false;
});

$('#user_register_form').submit(function(event) {
  event.preventDefault();
  App.disableButton(
    '#signup_trigger_button',
    '<i class="fas fa-cog fa-spin"></i> Proccessing...'
  );
  var values = $('#user_register_form').serialize();

  $.ajax({
    url: '/authentication/user_registration',
    type: 'POST',

    data: values,
    success: function(response) {
      App.enableButton('#signup_trigger_button', ' Create your account');

      var data = JSON.parse(response);
      //  enableBtn("<i class=\"fas fa-plus-circle\"></i> Post", "dynamicBtnSubmitForm");
      console.log(response);

      if (data.success) {
        $('#user_register_form_wrapper').hide();

        var text =
          '<div class="p-4">Your registration was successful. Please check your email and activate your account. Thank you. <br> <a href="/" class="btn btn-primary">Continue</a></div>';
        App.alertCustom('success', 'Thank You!', text, '#msg-div2');
        // alert('ok');
      } else if (data.error) {
        App.alert(data.error.msg, '#msg-div', 'danger');
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // console.log(textStatus, errorThrown);
      App.enableButton('#signup_trigger_button', ' Create your account');
    }
  });
  return false;
});
