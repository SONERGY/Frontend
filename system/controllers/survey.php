<?php
class Survey extends Controller
{
    public function new()

    {
        $param = new stdClass();
        $object = new stdClass();
        $param->null =  0;

        $object->name = "get_plans";
        $object->param = $param;

        $api_data  = json_encode($object);
        $response = curl_with_auth($api_data);

        // var_dump($response);
       
        if (empty($response)) {
        }else{
            $this->view('dashboard/survey/create', json_decode($response));
        }
        
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
            $param->survey_id =  $_POST['idx'];


            $object->name = "publish_survey";
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

    public function add_poster()
    {
        $success = array();
        $error = array();
        $data = array();

        if (isset($_POST['survey_id'])) {
            $survey_id = $_POST['survey_id'];
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
            $param->survey_id =  $survey_id;


            $object->name = "add_survey_poster";
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

    public function check()
    {
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->default = "";

        $object->name = "check_incomplete_survey";
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
        
        $param = new stdClass();
        $object = new stdClass();

        $param->code = "NA";

    
        $object->name = "fetch_ext_surveys";
        $object->param = $param;

        $form_data  = json_encode($object);
            
        $response = curl_with_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

    public function my_surveys()
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

    
        $object->name = "fetch_surveys";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_with_auth($form_data);

        // var_dump($response);
        
        $res = json_decode($response, true);

        $this->view('dashboard/survey/my-surveys', $res['response']['data']);
    }

    public function answers($id)
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $pieces0 = explode("4565", $id);
        $encode = $pieces0[1]; // piece2

        // echo $encode;

        $param = new stdClass();
        $object = new stdClass();

        $param->survey_id = $encode;


        $object->name = "fetch_my_answers";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/survey/unique-survey', $res['response']['data']);
        // $this->view('dashboard/transactions');
    }

    public function unique_answers($id)
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
       


        $param = new stdClass();
        $object = new stdClass();

        $param->user_id = $user_id;
        $param->survey_id = $survey_id;

        $object->name = "fetch_user_answers";
        $object->param = $param;

        $form_data  = json_encode($object);
        // echo $form_data;
        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/survey/unique-answer', $res['response']['data']);
    }

    public function completed($id)
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        // $pieces0 = explode("4565", $id);
        // $encode = $pieces0[1]; // piece2

        // echo $encode;

        $param = new stdClass();
        $object = new stdClass();

        $param->survey_id = $id;


        $object->name = "fetch_my_survey_users";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('dashboard/survey/users-answers', $res['response']['data']);
        // $this->view('dashboard/transactions');
    }

    public function start_survey()
    {
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->survey_id = $_POST['id'];
        $param->question_length = $_POST['question_length'];

        $object->name = "start_survey";
        $object->param = $param;

        $form_data  = json_encode($object);

        // print_r($object);


        $response = curl_with_auth($form_data);
        // echo $response;
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


    public function add_question()
    {
        $success = array();
        $error = array();
        $data = array();


        if (

            isset($_POST['question_title'])     &&  !empty($_POST['question_title'])
            && isset($_POST['survey_id'])    &&  !empty($_POST['survey_id'])
            && isset($_POST['question_type'])    &&  !empty($_POST['question_type'])

        ) {


            $param = new stdClass();
            $object = new stdClass();
            $param->question_title = $_POST['question_title'];
            $param->survey_id =  $_POST['survey_id'];
            $param->question_type = $_POST['question_type'];
            $param->survey_id = $_POST['survey_id'];

            if ($_POST['question_type'] == "radio" || $_POST['question_type'] == "checkbox") {
                $options = json_encode($_POST['options']);
                $param->options = $options;
            } else if ($_POST['question_type'] == "string") {
                $param->data_type = $_POST['data_type'];
            }



            $object->name = "create_survey_question";
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

        // if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){


        if (

            isset($_POST['survey_title'])     &&  !empty($_POST['survey_title'])
            && isset($_POST['survey_language'])    &&  !empty($_POST['survey_language'])
            && isset($_POST['introduction_text'])    &&  !empty($_POST['introduction_text'])
            && isset($_POST['survey_id']) && isset($_POST['duration']) && !empty($_POST['duration']) && isset($_POST['start_date']) && !empty($_POST['start_date']) 
        ) {

            $param = new stdClass();
            $object = new stdClass();

            $param->survey_title = $_POST['survey_title'];
            $param->survey_language =  $_POST['survey_language'];
            $param->introduction_text = $_POST['introduction_text'];
            $param->survey_id = $_POST['survey_id'];
            $param->duration = $_POST['duration'];
            $result = preg_split("/[\/,]+/",$_POST['start_date']);
            // echo $_POST['start_date'];
            $param->start_date = $result[2]."-".$result[0]."-".$result[1];
            
          



            $object->name = "create_new_survey";
            $object->param = $param;

            $form_data  = json_encode($object);

            // echo $form_data;
             //print_r($object);


            // $response = null;
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
            $error["msg"] = "Error occurred. Try again later.
            Please make sure all fields are filled in correctly";
            $data["error"] = $error;
        }


        echo json_encode($data);
    }

    public function participate($id)

    {
        $this->view('dashboard/survey/participate');
        
    }

    public function unique_survey()
    {
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->survey_id = $_POST['id'];

        $object->name = "get_unique_survey";
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

    public function question_answer()
    {
        $success = array();
        $error = array();
        $data = array();

        $param = new stdClass();
        $object = new stdClass();

        $param->survey_id = $_POST['id'];

        $object->name = "get_unique_survey_answer";
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

    public function answer_question()
    {
        $success = array();
        $error = array();
        $data = array();

        // var_dump($_POST);

        if (isset($_POST['answer'])) {
            $answer = json_encode($_POST['answer']);
        }

        // var_dump($answer);

        if (isset($_POST['questions_id']) && isset($_POST['survey_id']) && isset($_POST['question_type'])) {
            $questions_id = $_POST['questions_id'];
            $question_type = $_POST['question_type'];
            $survey_id = $_POST['survey_id'];
        }

        if (empty($answer)) {
            $error["msg"] = "Please provide an answer.";
            $data["error"] = $error;
        } else {
            $param = new stdClass();
            $object = new stdClass();

            $param->survey_id = $survey_id;
            $param->questions_id = $questions_id;
            $param->question_type = $question_type;
            $param->answer = $answer;

            $object->name = "answer_survey";
            $object->param = $param;

            $form_data  = json_encode($object);

            // print_r($object);
            
            
            $response = curl_with_auth($form_data);
            // echo $response;
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
        }
        
        echo json_encode($data);
    }

    public function completed_surveys()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_COOKIE['user_type']) && ($_COOKIE['user_type'] == 'admin')) {
            
            $param = new stdClass();
            $object = new stdClass();
    
            $param->code = "NA";
    
            $object->name = "fetch_all_surveys";
            $object->param = $param;
    
            $form_data  = json_encode($object);
                
            $response = curl_with_auth($form_data);
    
            // var_dump($response);
            
            $res = json_decode($response, true);
    
            $this->view('admin/survey/completed-surveys', $res['response']['data']); 
        } else {
            die("<h3>Access Denied</h3>");
        }

        
    }

    
}
