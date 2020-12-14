<?php require_once("public/page-parts/new/dashboard.php") ?>
    <!-- Dashboard Full Area -->
    <div class="cryptodash-full-wrapper">
    <div class="crypto-dash-sidenav">
<?php require_once("public/page-parts/new/sideNav.php") ?>
          
                    
                <!-- Page content -->
                <div id="page-content-wrapper" class="dashboard-content">
                  <!-- Keep all page content within the page-content inset div! -->
                  <div class="page-content inset">
                        <div class="crypto-container">
                            <div class="row">
                                <div class="col-xl-7 offset-xl-2 prl">
                               
                                    <div class="crypto-overview-wrapper">
                                      <h2 class="crypto-stitle" id="survey_title"></h2>
                                        <div class="questions-overview">
                                            
                                        
<?php
// echo "<pre>";

//print_r($data);
// echo "</pre>";

// $actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(isset($_COOKIE['user_type']) && !empty($_COOKIE['user_type'])) {
    $user_type = $_COOKIE['user_type'];
}



$number = 1;
foreach ($data as $key => $value) {
  $survey_question_title = $value['survey_question_title'];
  $survey_question_type = $value['survey_question_type'];
  $survey_question_options = json_decode($value['survey_question_options'], true);
  //var_dump($survey_question_options);
//   $id = $value['id'];
?>
<div class="mb-4">
    <h5 class="mb-1"><span class="font-weight-bold">Qs <?php echo $number++ ?> </span><?php echo $survey_question_title ?></h5>
<?php

    if ($survey_question_type == "string") {
      
?>

<div class="form-group">
  <input class="form-control" type="text" Placeholder="Enter Answer" >
</div>

<?php

    } else {

      
?>

<ul>
<?php

// $survey_question_answers = str_replace('"', '', $survey_question_answers);

for ($i=0; $i < sizeof($survey_question_options); $i++) { 
    // echo $survey_question_options[$i]."<br/>";
    
    ?>
      <li><?php echo $survey_question_options[$i] ?></li>
    <?php    
    
}

?>
    </ul>

<?php

    }
    

?>
    
</div>
<?php

}

if($user_type == 'validator') {
?>
                                            <div class="text-center">
                                                <form>
                                                    <div class="d-none">
                                                        <input type="hidden" id="user_id" value="<?php echo $user_id ?>">
                                                        <input type="hidden" id="survey_id" value="<?php echo $survey_id ?>">
                                                        <input type="hidden" id="amount" value="4000">
                                                    </div>
                                                    <!-- <button class="btn btn-danger" type="">Decline</button> -->
                                                    <button id="validateSurvey" class="btn btn-primary" type="">Validate</button>
                                                </form>
                                            </div>

<?php
} else {
?>

                                            <div class="text-center">
                                                <a href="/survey/my_surveys/" class="btn btn-primary text-white" type="">Go Back</a>
                                            </div>

<?php
}
?>
                                            
                                            
                                        </div>
                                    </div>
                                  

                                </div>
                                
                            </div>
                            

                        </div>
                        
                  </div>
                </div>
                <!-- /Page content -->
              </div>
        </div>
    </div>
    <!-- Dashboard Full Area -->
    <?php require_once("public/page-parts/new/footer-js.php") ?>
    
    <script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <!-- <script src="/public/static/js/unique-survey.js"></script> -->
    <script src="/public/static/js/validate.js?v=<?php echo STATIC_VERSION ?>"></script>
    
    <script>
        $('#input-calc-start_date').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        
        });

        $('#input-calc-end_date').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        
        });
    </script>
