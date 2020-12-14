$(document).ready(function() {
  var user_infos = user_info();

  var user_email = user_infos.email;
  var user_document = user_infos.sdocument;
  var user_profile_img = user_infos.profile_img;
  var has_paid = user_infos.has_paid;
  var user_name = user_infos.user_name;
  var auth_code = user_infos.auth_code;

  var viewReferal = 'https://sonergy.io/referrals/link/' + user_email + '';

  $('.auth_code').val(auth_code);
  $('#email1').val(user_email);
  $('#referal').html(user_email);
  $('#user_name').html(user_name);

  // For KYC page

  // if (user_profile_img === null) {
  //   $('#pro-action').html('Set');
  //   // console.log('empty user_profile_img');
  // } else {
  //   $('#pro-action').html('Change');
  //   // console.log('not empty user_profile_img');
  //   $('.profile_img img').attr('src', '/' + user_profile_img);
  // }

  // if (user_document === null) {
  //   console.log('empty user_document');
  // } else {
  //   console.log('not empty user_document');
  //   $('#document_img').html(
  //     '<img class="img-fluid w-50" src=' + user_document + ' />'
  //   );
  // }

  // console.log(user_infos);

  $('#referral_link_textbox').val(viewReferal);
  var ck = getCookie('has_paid');
  //console.log(ck);
  if (has_paid == 1 || ck == 1) {
    $('#referLink').show();
  } else {
    $('#refer').show();
  }
  // alert(email1);
});
