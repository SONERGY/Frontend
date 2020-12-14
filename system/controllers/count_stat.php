<?php
class Count_stat extends Controller
{

    public function index()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $email = $_POST['email'];

        $param = new stdClass();
        $object = new stdClass();

        $param->email = $email;


        $object->name = "count_user_stat";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}
