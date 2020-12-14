<?php 
    class Kyc extends Controller
    {
    
        public function index()
        {
            $this->view('dashboard/kyc/index');
        }

        public function profile()
        {
            $success = array();
            $error = array();
            $data = array();

            $valid_extensions = array('jpeg' , 'JPEG' , 'jpg', 'JPG', 'PNG' , 'png');
            $img_url = 'public/static/profile_picture/';            
            // var_dump($_POST);

            if (isset($_POST['code'])) {
                $code = $_POST['code'];

                if ($_FILES["file1"]) {
                    $imgsurfix = "log";
                    $image1 = $_FILES['file1']['name'];
                    $type1 = $_FILES['file1']['type'];
                    $tmp_name1 = $_FILES['file1']['tmp_name'];
        
                    // var_dump($image1);
                    $ext = strtolower(pathinfo($image1, PATHINFO_EXTENSION));
        
                    if ($ext == "jpeg" || $ext == "JPEG" || $ext == "jpg" || $ext == "JPG") {
                        $final_image = rand(1000,1000000).$imgsurfix.".jpg";                
                    } else if ($ext == "PNG" || $ext == "png") {
                        $final_image = rand(1000,1000000).$imgsurfix.".png";    
                    }
        
                    if (in_array($ext, $valid_extensions)) {
                        $img_url1 = $img_url.$final_image;
                        // var_dump($final_image);
                        if (move_uploaded_file($tmp_name1, $img_url1)) {
        
                            $param = new stdClass();
                            $object = new stdClass();
                
                            $param->imgPath =  $img_url1;
                            $param->code =  $code;
                            
                            $object->name = "edit_profile";
                            $object->param = $param;
                
                            $form_data  = json_encode($object);
                
                            // echo $form_data;
                            // print_r($object);
                            // var_dump($form_data);
                            $response = curl_with_auth($form_data);
                
                            if (empty($response)) {
                                $error["msg"] = "Can't complete your request at the moment.";
                                $data["error"] = $error;
                            } else {
                                $rs =  json_decode($response,  true);
                
                                if (isset($rs['error'])) {
                                    unlink("public/static/profile_picture/{$final_image}"); 
                                    $error["msg"] = $rs['error']['message'];
                                    $data["error"] = $error;
                                } else if (isset($rs['response'])) {
                                    //time()+3600
                                    $success["msg"] = $rs['response']['data']['message'];
                                    $success["data"] = $rs['response']['data'];
                                    if (
                                        setcookie("profile_img", $img_url1, time() + 13600, "/")
                                      ) {
                            
                                        $success["status"] = "OK";
                                        // $success["img"] = $img_url1;
                                        $data["success"] = $success;
                                      }
                                    
                                }
                            }
                        } else {
                            $error["msg"] = "Error occurred. Try again later";
                            $data["error"] = $error;
                        }
                    }
        
                }
            }
    
            echo json_encode($data);
        }

        public function document()
        {
            $success = array();
            $error = array();
            $data = array();

            $valid_extensions = array('jpeg' , 'JPEG' , 'jpg', 'JPG', 'PNG' , 'png');
            $img_url = 'public/static/documents/';            
            // var_dump($_POST);

            if (isset($_POST['code'])) {
                $code = $_POST['code'];

                if ($_FILES["documents"]) {
                    $imgsurfix = "log";
                    $image1 = $_FILES['documents']['name'];
                    $type1 = $_FILES['documents']['type'];
                    $tmp_name1 = $_FILES['documents']['tmp_name'];
        
                    // var_dump($image1);
                    $ext = strtolower(pathinfo($image1, PATHINFO_EXTENSION));
        
                    if ($ext == "jpeg" || $ext == "JPEG" || $ext == "jpg" || $ext == "JPG") {
                        $final_image = rand(1000,1000000).$imgsurfix.".jpg";                
                    } else if ($ext == "PNG" || $ext == "png") {
                        $final_image = rand(1000,1000000).$imgsurfix.".png";    
                    }
        
                    if (in_array($ext, $valid_extensions)) {
                        $img_url1 = $img_url.$final_image;
                        // var_dump($final_image);
                        if (move_uploaded_file($tmp_name1, $img_url1)) {
        
                            $param = new stdClass();
                            $object = new stdClass();
                
                            $param->docPath =  $img_url1;
                            $param->code =  $code;
                            
                            $object->name = "add_document";
                            $object->param = $param;
                
                            $form_data  = json_encode($object);
                
                            // echo $form_data;
                            // print_r($object);
                            // var_dump($form_data);
                            $response = curl_with_auth($form_data);
                
                            if (empty($response)) {
                                $error["msg"] = "Can't complete your request at the moment.";
                                $data["error"] = $error;
                            } else {
                                $rs =  json_decode($response,  true);
                
                                if (isset($rs['error'])) {
                                    unlink("public/static/profile_picture/{$final_image}"); 
                                    $error["msg"] = $rs['error']['message'];
                                    $data["error"] = $error;
                                } else if (isset($rs['response'])) {
                                    //time()+3600
                                    $success["msg"] = $rs['response']['data']['message'];
                                    $success["data"] = $rs['response']['data'];
                                    if (
                                        setcookie("document_img", $img_url1, time() + 13600, "/")
                                      ) {
                            
                                        $success["status"] = "OK";
                                        // $success["img"] = $img_url1;
                                        $data["success"] = $success;
                                      }
                                }
                            }
                        } else {
                            $error["msg"] = "Error occurred. Try again later";
                            $data["error"] = $error;
                        }
                    }
        
                }
            }
    
            echo json_encode($data);
        }

        public function change_username()
        {

            $success = array();
            $error = array();
            $data = array();
            // var_dump($_POST);


            if (isset($_POST['oldUsername']) && isset($_POST['newUsername']) && isset($_POST['confirmUsername'])) {
                $oldUsername = $_POST['oldUsername'];
                $newUsername = $_POST['newUsername'];
                $confirmUsername = $_POST['confirmUsername'];
            }

            if (!empty($newUsername) && !empty($confirmUsername)) {
                

                if ($newUsername !== $confirmUsername) {
                    $error["msg"] = "Username do not match";
                    $data["error"] = $error;
                } else {
                    if (strlen($confirmUsername) < 8) {
                        $error["msg"] = "Username must be atleast 8 characters";
                        $data["error"] = $error;
                    } else {
                        $param = new stdClass();
                        $object = new stdClass();
                
                        $param->oldUsername = $oldUsername;
                        $param->newUsername = $confirmUsername;
                
                        $object->name = "change_username";
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
                                if (
                                    setcookie("user_name", $newUsername, time() + 13600, "/")
                                ) {
                        
                                    $success["status"] = "OK";
                                    $data["success"] = $success;
                                }
                            
                            
                            }
                            
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
?>