<?php
class Authentication extends Controller
{


  public function user_registration()
  {

    $success = array();
    $error = array();
    $data = array();

    $referal =      $_POST['referal'];
    $username =    $_POST['username'];
    $email =        $_POST['email'];
    $password =     $_POST['password'];
    $password2 =    $_POST['passwordConfirmation'];

    if (empty($referal)) {
      $referal = "none";
    }
    if ($password != $password2) {
      $error["msg"] = "Password do not match!";
      $data["error"] = $error;
    } else if (strlen($username) < 8) {
      $error["msg"] = "Username must be at least 8 characters";
      $data["error"] = $error;
    } else if (is_a_valid_email($email) == false) {
      $error["msg"] = "Invalid email address";
      $data["error"] = $error;
    } else {

      $param = new stdClass();
      $object = new stdClass();

      $param->referal = $referal;
      $param->email = $email;
      $param->password = $password;
      $param->user_name = $username;

      $object->name = "register_user";
      $object->param = $param;

      $form_data  = json_encode($object);



      $response = curl_without_auth($form_data);

      if (empty($response)) {
        $error["msg"] = "Can't complete your request at the moment.";
        $data["error"] = $error;
      } else {
        $rs =  json_decode($response,  true);

        if (isset($rs['error'])) {
          $error["msg"] = $rs['error']['message'];
          $data["error"] = $error;
        } else if (isset($rs['response'])) {

          $success["msg"] = $rs['response']['data']['message'];
          $success["status"] = "OK";
          $data["success"] = $success;
        }
      }
    }

    echo json_encode($data);
  }

  public function user_auth()
  {

    $success = array();
    $error = array();
    $data = array();

    $email = $_POST['email'];
    $password =  $_POST['password'];

    if (empty($email)) {
      $error["msg"] = "Email address required";
      $data["error"] = $error;
    } else if (is_a_valid_email($email) == false) {
      $error["msg"] = "Invalid email address";
      $data["error"] = $error;
    } else if (empty($password)) {
      $error["msg"] = "Password required";
      $data["error"] = $error;
    } else {

      $param = new stdClass();
      $object = new stdClass();

      $param->email = $email;
      $param->password = $password;

      $object->name = "generate_token";
      $object->param = $param;

      $form_data  = json_encode($object);

      // var_dump($form_data);

      $response = curl_without_auth($form_data);
      // var_dump($response);


      if (empty($response)) {
        $error["msg"] = "Can't complete your request at the moment.";
        $data["error"] = $error;
      } else {
        $rs =  json_decode($response,  true);

        if (isset($rs['error'])) {
          $error["msg"] = $rs['error']['message'];
          $data["error"] = $error;
        } else if (isset($rs['response'])) {
          //time()+3600
          $user_data = $rs['response']['data']['user'];
          // var_dump ($user_data);
          if (
            setcookie("token", $rs['response']['data']['token'], time() + 13600, "/") && 
            setcookie("user_name", $rs['response']['data']['user']['user_name'], time() + 13600, "/") &&
            setcookie("user_type", $rs['response']['data']['user']['user_type'], time() + 13600, "/") &&
            setcookie("profile_img", $rs['response']['data']['user']['profile_img'], time() + 13600, "/") &&
            setcookie("document_img", $rs['response']['data']['user']['document'], time() + 13600, "/") &&
            setcookie("email", $rs['response']['data']['user']['email'], time() + 13600, "/")
          ) {


            $success["msg"] = "Authenticated!!";
            $success["status"] = "OK";
            $data["user_data"] = $user_data;
            $data["success"] = $success;
          }
        }
      }
    }
    // var_dump($data);
    echo json_encode($data);
  }


  public function reauthenticate()
  {
    $success = array();
    $error = array();
    $data = array();

    $email = $_POST['email'];
    $password =  $_POST['password'];

    // var_dump($password);

    $param = new stdClass();
    $object = new stdClass();

    $param->email = $email;
    $param->password = $password;

    $object->name = "resend_activation";
    $object->param = $param;

    $form_data  = json_encode($object);


    $response = curl_without_auth($form_data);
    // var_dump($response);




    if (empty($response)) {
      $error["msg"] = "Can't complete your request at the moment.";
      $data["error"] = $error;
    } else {
      $rs =  json_decode($response,  true);

      if (isset($rs['error'])) {
        $error["msg"] = $rs['error']['message'];
        $data["error"] = $error;
      } else if (isset($rs['response'])) {
        //time()+3600
        $success["msg"] = $rs['response']['data']['message'];
        $success["status"] = "OK";
        $data["success"] = $success;
      }
    }
    // var_dump($data);
    echo json_encode($data);
  }
}
