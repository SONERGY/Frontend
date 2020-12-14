<?php
class Plans extends Controller
{
  public function index()
  {
    if (isset($_COOKIE['user_type']) && ($_COOKIE['user_type'] == 'admin')) {
      // print_r($_POST);
      $success = array();
      $error = array();
      $data = array();
      

      $param = new stdClass();
      $object = new stdClass();

      $param->code = "NA";

      $object->name = "fetch_survey_plans";
      $object->param = $param;

      $form_data  = json_encode($object);
      $response = curl_with_auth($form_data);

      // var_dump($response);
      
      $res = json_decode($response, true);
      $this->view('admin/plans/index', $res);
    } else {
      die("<h3>Access Denied</h3>");
    }

  }

  public function add()
  {
      $this->view('admin/add-plans');
  }

  public function submit()
  {
    // var_dump($_POST);
    $success = array();
    $error = array();
    $data = array();

    if (isset($_POST['available_plans']) && isset($_POST['survey_plan'])&& isset($_POST['survey_duration']) && isset($_POST['survey_amount'])) {
      $available_plans = $_POST['available_plans'];
      $survey_plan = $_POST['survey_plan'];
      $survey_duration = $_POST['survey_duration'];
      $survey_amount = $_POST['survey_amount'];
    } 

    if (!is_numeric($survey_amount)) {
      $error["msg"] = "Please enter a valid amount.";
      $data["error"] = $error;
    } else {

      $param = new stdClass();
      $object = new stdClass();

      $param->update_plan = $available_plans;
      $param->survey_plan =  $survey_plan;
      $param->survey_duration =  $survey_duration;
      $param->plan_amount =  $survey_amount;


      $object->name = "add_survey_plan";
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

  
      $object->name = "fetch_survey_plans";
      $object->param = $param;

      $form_data  = json_encode($object);
          
      $response = curl_without_auth($form_data);

      // var_dump($response);

      echo  $response;
  }

  public function delete()
    {
        $success = array();
        $error = array();
        $data = array();
        

        // var_dump($_POST['main_id']);
        $param = new stdClass();
        $object = new stdClass();


        $param->id = $_POST['main_id'];
        // $param->table = $table;
        

        $object->name = "delete_survey_plan";
        $object->param = $param;

        $form_data  = json_encode($object);

        //  echo $form_data;
        // print_r($object);
        

        $response = curl_with_auth($form_data);
        
        // var_dump($response);

        
        if (empty($response)) {
            $error["msg"] = "Can't complete your request at the moment.";
            $data["error"] = $error;
        } else {
            $rs =  json_decode($response,  true);

            // print_r($rs);
        
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

        echo json_encode($data);
    }
  
  public function admin()
  {
    // print_r($_POST);
    $success = array();
    $error = array();
    $data = array();
    

    $param = new stdClass();
    $object = new stdClass();

    $param->code = "NA";


    $object->name = "fetch_survey_plans";
    $object->param = $param;

    $form_data  = json_encode($object);
        
       
        
    $response = curl_with_auth($form_data);

    // var_dump($response);
    
    $res = json_decode($response, true);

    $this->view('admin/view-plans', $res);

  }
  
}
