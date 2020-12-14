<?php
class Referrals extends Controller
{

    public function link($value = '')
    {
        if (setcookie("refer", $value, time() + 96000 * 50, '/')) {
            redirect_to("/");
        }
    }

    public function index()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();


        $param = new stdClass();
        $object = new stdClass();

        $param->email = $_COOKIE['email'];


        $object->name = "admin_referal";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/referals', $res['response']['data']);
    }

    public function count()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $email = $_POST['email'];

        $param = new stdClass();
        $object = new stdClass();

        $param->email = $email;


        $object->name = "count_user_referal";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}
