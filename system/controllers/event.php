<?php
class Event extends Controller
{
    public function new()
    {
        $this->view('dashboard/event/create');
    }

    public function publish()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();



        if (isset($_POST['idx'])) {


            $param = new stdClass();
            $object = new stdClass();

            // $param->poster = $final_image;
            $param->event_id =  $_POST['idx'];


            $object->name = "publish_event";
            $object->param = $param;

            $form_data  = json_encode($object);

            // echo $form_data;
            // print_r($object);


            $response = curl_with_auth($form_data);

            //var_dump($response);
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
                    // $success["id"] = $rs['response']['data']['id'];
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

    public function check()
    {
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->default = "";

        $object->name = "check_incomplete_event";
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

    public function fetch()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        // if (isset($_COOKIE['custodian'])) {
        //     $walletId = $_COOKIE['custodian'];
        // }

        $param = new stdClass();
        $object = new stdClass();

        $param->code = "NA";

    
        $object->name = "fetch_events";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_with_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }


    public function add_poster()
    {
        $success = array();
        $error = array();
        $data = array();

        if (isset($_POST['event_id'])) {
            $event_id = $_POST['event_id'];
        }

        $valid_extensions = array('jpeg' , 'JPEG' , 'jpg', 'JPG', 'PNG' , 'png');
        $img_url = 'public/static/posters/';

        if ($_FILES["file1"]) {
            $imgsurfix = "EVP";
            $image1 = $_FILES['file1']['name'];
            $type1 = $_FILES['file1']['type'];
            $tmp_name1 = $_FILES['file1']['tmp_name'];

            $ext = strtolower(pathinfo($image1, PATHINFO_EXTENSION));

            if ($ext == "jpeg" || $ext == "JPEG" || $ext == "jpg" || $ext == "JPG") {
                $final_image = rand(1000,1000000).$imgsurfix.".jpg";                
            } else if ($ext == "PNG" || $ext == "png") {
                $final_image = rand(1000,1000000).$imgsurfix.".png";    
            }

            if (in_array($ext, $valid_extensions)) {
                $img_url1 = $img_url.$final_image;
            }

        }

        if (move_uploaded_file($tmp_name1, $img_url1)) {


            $param = new stdClass();
            $object = new stdClass();

            $param->poster = $final_image;
            $param->event_id =  $event_id;


            $object->name = "add_event_poster";
            $object->param = $param;

            $form_data  = json_encode($object);

            // echo $form_data;
            // print_r($object);


            $response = curl_with_auth($form_data);

            //var_dump($response);
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
                    $success["id"] = $rs['response']['data']['id'];
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

    public function introduction()
    {

        $success = array();
        $error = array();
        $data = array();
        $post_time = time();

        $date = date('Y-m-d H:i:s', $post_time);


        if (

            isset($_POST['event_title'])     &&  !empty($_POST['event_title'])
            && isset($_POST['event_link'])    &&  !empty($_POST['event_link'])
            && isset($_POST['strt_date'])    &&  !empty($_POST['strt_date'])
            && isset($_POST['end_date'])    &&  !empty($_POST['end_date'])
            && isset($_POST['description_text'])    &&  !empty($_POST['description_text'])
            && isset($_POST['event_id'])
        ) {

            $event_title = $_POST['event_title'];
            $event_link = $_POST['event_link'];
            $strt_date = $_POST['strt_date'];
            $end_date = $_POST['end_date'];
            $description_text = $_POST['description_text'];
            $event_id = $_POST['event_id'];

            if (!is_a_valid_url($event_link)) {
                $error["msg"] = "Please provide a valid event link.";
                $data["error"] = $error;
            } else {

                $param = new stdClass();
                $object = new stdClass();
    
                $param->event_title = $event_title;
                $param->event_link =  $event_link;
                $param->start_date = $strt_date;
                $param->end_date = $end_date;
                $param->description_text = $description_text;
                $param->event_id = $event_id;
    
    
    
                $object->name = "create_new_event";
                $object->param = $param;
    
                $form_data  = json_encode($object);
    
                //echo $form_data;
                
                
                $response = curl_with_auth($form_data);
                
                // print_r($response);
                //var_dump($response);
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
                        $success["id"] = $rs['response']['data']['id'];
                        $success["data"] = $rs['response']['data'];
                        $success["status"] = "OK";
                        $data["success"] = $success;
                    }
                }
            }
            
        } else {
            $error["msg"] = "Error occurred. Try again later";
            $data["error"] = $error;
        }


        echo json_encode($data);
    }
}
