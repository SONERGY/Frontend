<?php
class Reset_password extends Controller
{
    public function index()
    {

        $success = array();
        $error = array();
        $data = array();


        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }


        if (empty($email)) {
            $error["msg"] = "Please enter your email address";
            $data["error"] = $error;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error["msg"] = "Please supply a valid email address";
            $data["error"] = $error;
        } else {

            $param = new stdClass();
            $object = new stdClass();
    
            $param->email = $email;
            
    
            $object->name = "reset_password";
            $object->param = $param;
    
            $form_data  = json_encode($object);
    
            // echo $form_data;
            // print_r($object);
            
    
            $response = curl_without_auth($form_data);
            
            
    
            
            if (empty($response)) {
                $error["msg"] = "Can't complete your request at the moment.";
                $data["error"] = $error;
            } else {
                $rs =  json_decode($response,  true);
            
                if(isset($rs['error'])){
                        $error["msg"] = $rs['error']['message'];
                        $data["error"] = $error;
                }else if(isset($rs['response'])){
                //time()+3600
                $success["msg"] = $rs['response']['data']['message'];
                    $success["status"] = "OK";
                    $data["success"] = $success;
                
                
                }
                
            } 
        }

        echo json_encode($data);
    }
}