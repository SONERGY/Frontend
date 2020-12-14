<?php
class Validation extends Controller
{

    public function index()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->code = "NA";

        $object->name = "fetch_approved_users";
        $object->param = $param;

        $form_data  = json_encode($object);

        $response = curl_with_auth($form_data);

        // print_r($response);

        $res = json_decode($response, true);

        $this->view('dashboard/validation/index', $res['response']['data']);
    }

    public function views($id)
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->user_id = $id;

        $object->name = "fetch_user_survey";
        $object->param = $param;

        $form_data  = json_encode($object);

        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/validation/user-surveys', $res['response']['data']);
    }

    public function answers($id)
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $pieces0 = explode("5325", $id);
        $encode = $pieces0[1]; // piece2

        
        $pieces = explode("2358", $encode);
        $user_id = $pieces[0]; // piece1
        $survey_id = $pieces[1]; // piece2
        // echo $id;

        $param = new stdClass();
        $object = new stdClass();

        $param->user_id = $user_id;
        $param->survey_id = $survey_id;

        $object->name = "fetch_user_answers";
        $object->param = $param;

        $form_data  = json_encode($object);

        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/validation/survey-answers', $res['response']['data']);
    }

    public function valid()
    {
        $success = array();
        $error = array();
        $data = array();

        // var_dump($_POST);

        $param = new stdClass();
        $object = new stdClass();

        $param->user_id = $_POST['user_id'];
        $param->survey_id = $_POST['survey_id'];
        $param->amount = $_POST['amount'];

        $object->name = "validate_survey_answer";
        $object->param = $param;

        $form_data  = json_encode($object);

        //echo $form_data;
        // print_r($object);

        $response = curl_with_auth($form_data);
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
                $success["data"] = $rs['response']['data'];

                $success["status"] = "OK";
                $data["success"] = $success;
            }
        }
        echo json_encode($data);
    }

}
