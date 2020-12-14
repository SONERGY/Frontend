// {"user_id":"27","user_first_name":"Ebri","user_last_name":"Goodness","user_email":"121ebrinix@gmail.com","user_email_auth_code":"87548630fd8803ad954d13337d0e74a8c30e6d48","user_birth_date":null,"user_phone":null,"user_address":null,"user_city":null,"user_create_at":"2019-10-10 16:49:56","user_update_at":"2019-10-10 16:49:56","user_state":null}
function user_info() {
  var retrievedObject = localStorage.getItem('user_info');
  // console.log(retrievedObject);

  var main_result = JSON.parse(retrievedObject);

  var user_id = main_result.user_id;
  var user_name = main_result.user_user_name;
  var email = main_result.user_email;
  var sdocument = main_result.user_document;
  var profile_img = main_result.user_profile_img;
  var auth_code = main_result.user_auth_code;
  var has_paid = main_result.user_has_paid;
  var status = main_result.user_status;

  var unique_info = {
    user_id: user_id,
    user_name: user_name,
    email: email,
    profile_img: profile_img,
    sdocument: sdocument,
    auth_code: auth_code,
    has_paid: has_paid,
    status: status
  };

  return unique_info;
}

// function hire_info() {
//     var retrievedObject = localStorage.getItem('finalinfo');
//     // console.log(retrievedObject);

//     var main_result = JSON.parse(retrievedObject);

//     var driver_id = main_result.id;
//     var name = main_result.name;
//     var fees = main_result.fees;
//     var email = main_result.email;
//     var work_spec = main_result.work_spec;
//     var term_duration = main_result.term_duration;

//     var final_info = {
//         "driver_id" : driver_id,
//         "name" : name,
//         "fees" : fees,
//         "email" : email,
//         "work_spec" : work_spec,
//         "term_duration" : term_duration,

//     }

//     // console.log(final_info);

//     return final_info;
// }
