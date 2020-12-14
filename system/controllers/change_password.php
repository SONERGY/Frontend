<?php
class Change_password extends Controller
{
    public function index()
    {

        $success = array();
        $error = array();
        $data = array();


        // if (isset($_POST['code']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
        //     $code = $_POST['code'];
        //     $newPassword = $_POST['newPassword'];
        //     $confirmPassword = $_POST['confirmPassword'];
        // }

        if (!empty($_POST['code']) && !empty($_POST['newPassword']) && !empty($_POST['confirmPassword'])) {
            $code = $_POST['code'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($newPassword !== $confirmPassword) {
                $error["msg"] = "Password do not match";
                $data["error"] = $error;
            } else {
    
                $param = new stdClass();
                $object = new stdClass();
        
                $param->code = $code;
                $param->new_password = $newPassword;
                $param->confirm_password = $confirmPassword;
        
                $object->name = "change_password";
                $object->param = $param;
        
                $form_data  = json_encode($object);
        
                // echo $form_data;
                // print_r($object);
                $response = curl_without_auth($form_data);
    
                // var_dump($response);
                
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

        } else {
            $error["msg"] = "All fields are required.";
            $data["error"] = $error;
        }


        echo json_encode($data);
    }
}