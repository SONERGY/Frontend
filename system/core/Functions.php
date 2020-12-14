<?php 
 
 function is_a_valid_string($var = null)
 {
   $pattern = '/^[a-zA-Z ]*$/';
   
    if(preg_match($pattern,$var)){
       return true;
    }else{
      return false;
    }
 }


  function is_a_valid_email($var = null)
 {
   if (!filter_var($var, FILTER_VALIDATE_EMAIL)) {
      return false;
    }else{
       return true;
    }
 }


function is_a_valid_url($var = null)
{
   if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$var)) {
     return false;
    }else{
       return true;
    }
}


function redirect_to($location = NULL)
{
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}



 function curl_without_auth($var = null)
{
   $curl = curl_init();

   curl_setopt_array($curl, array(
   CURLOPT_URL => API_SERVER,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => $var,
   CURLOPT_HTTPHEADER => array(
       "cache-control: no-cache",
       "content-type: application/json",
      
   ),
   ));



   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if($err){

   }else{
      return $response;
   }
}

function curl_with_auth($var = null)
{
   $token = "";

   if (isset($_COOKIE['token'])) {
      $token = $_COOKIE['token'];
   }

   $curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => API_SERVER,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $var,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$token,
    "Content-Type: application/json",
    "cache-control: no-cache"
  ),
));
  

   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if($err){

   }else{
      return $response;
   }
}

 

?>