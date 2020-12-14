<?php
class Payment extends Controller
{

  public function index()
  {

    // var_dump($_POST);

    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $date = date('Y-m-d H:i:s', $post_time);


    if (
      isset($_POST['message']) && !empty($_POST['message']) &&
      isset($_POST['reference']) &&  !empty($_POST['reference'])
      && isset($_POST['response'])    &&  !empty($_POST['response'])
      && isset($_POST['status'])    &&  !empty($_POST['status'])
      && isset($_POST['trans'])     &&  !empty($_POST['trans'])
      && isset($_POST['trxref'])    &&  !empty($_POST['trxref'])
      && isset($_POST['email'])    &&  !empty($_POST['email'])
      && isset($_POST['paymenttype'])    &&  !empty($_POST['paymenttype'])
      && isset($_POST['cause_id'])    &&  !empty($_POST['cause_id'])
      && isset($_POST['amount'])    &&  !empty($_POST['amount'])
    ) {


      $message = $_POST['message'];
      $reference = $_POST['reference'];
      $response = $_POST['response'];
      $status = $_POST['status'];
      $trans = $_POST['trans'];
      $trxref = $_POST['trxref'];
      $paymenttype = $_POST['paymenttype'];
      $cause_id = $_POST['cause_id'];
      $email = $_POST['email'];
      $amount = $_POST['amount'];


      $param = new stdClass();
      $object = new stdClass();

      $param->email = $email;
      $param->message = $message;
      $param->reference = $reference;
      $param->response = $response;
      $param->status = $status;
      $param->trans = $trans;
      $param->trxref = $trxref;
      $param->paymenttype = $paymenttype;
      $param->cause_id = $cause_id;
      $param->amount = $amount;
      $param->date = $date;


      $object->name = "payment";
      $object->param = $param;

      $form_data  = json_encode($object);

      // echo $form_data;
      // print_r($object);


      $response = curl_with_auth($form_data);

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
          $success["data"] = $rs['response']['data'];
          $success["status"] = "OK";
          $data["success"] = $success;
        }
      }
    } else {
      $error["msg"] = "Error occurred. Try again later";
      $data["error"] = $error;
    }


    echo json_encode($data);
  }
}
