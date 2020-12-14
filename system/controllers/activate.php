<?php
class Activate extends Controller
{
    public function index($code)
    {
    
        $param = new stdClass();
        $object = new stdClass();

        $param->code = $code;

    
        $object->name = "activate";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_with_auth($form_data);

        
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
        
        // var_dump($res);
        
        $this->view('account/activate', $data);
    }

    
}