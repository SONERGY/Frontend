<?php require_once("public/page-parts/new/dashboard.php") ?>
    <!-- Dashboard Full Area -->
    <div class="cryptodash-full-wrapper">
    <div class="crypto-dash-sidenav">
<?php 
require_once("public/page-parts/new/sideNav.php") ;

$actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


$pieces = explode("5325", $actual_link);

$id_code = $pieces[1]; // piece2

$part = explode("2358", $id_code);
$user_id = $part[0]; // piece1
$survey_id = $part[1]; // piece2
// echo $user_id.'<br/>';
// echo $pieces[0];

$get_survey = explode("/unique_answers/", $pieces[0]);

$survey_title = $get_survey[1];

$title = str_replace('%20', ' ', $survey_title)
?>
          
                    
                <!-- Page content -->
                <div id="page-content-wrapper" class="dashboard-content">
                  <!-- Keep all page content within the page-content inset div! -->
                  <div class="page-content inset">
                        <div class="crypto-container">
                            <div class="row">
                                <div class="col-xl-7 offset-xl-2 prl">
                               
                                    <div class="crypto-overview-wrapper">
                                        <div class="questions-overview">
                                      <h2  class="crypto-stitle text-center" id="survey_title"><?php echo $title; ?></h2>


                                            
                                        
<?php
// echo "<pre>";

// print_r($data);
// echo "</pre>";

// echo $survey_title;

$number = 1;
foreach ($data as $key => $value) {
  $survey_question_title = $value['survey_question_title'];
  $survey_question_type = $value['survey_question_type'];
  $survey_question_answers = $value['survey_question_answers'];
  $survey_question_answers2 = json_decode($value['survey_question_answers'], true);
  $survey_question_options = json_decode($value['survey_question_options'], true);
//   var_dump($survey_question_type);
//   $id = $value['id'];
// echo $value['survey_question_type'];
// echo "<br>";
// echo $survey_question_answers;
?>
<div class="mb-4">
    <h5 class="mb-1"><span class="font-weight-bold">Qs <?php echo $number++ ?> </span><?php echo $survey_question_title ?></h5>
    <ul>
<?php

$survey_question_answers = str_replace('"', '', $survey_question_answers);

if ($survey_question_type == 'string') {
    echo $survey_question_answers;
} else if ($survey_question_type == 'checkbox') {

    if (is_array(json_decode($value['survey_question_answers'], true)) == true) {
        // echo $survey_question_answers.'<br>';
        for ($i=0; $i < sizeof($survey_question_options); $i++) { 
            // echo $survey_question_answers;
            for ($y=0; $y < sizeof($survey_question_answers2); $y++) {
                // echo $survey_question_answers2[$y];
                if ($survey_question_options[$i] == $survey_question_answers2[$y]) {
                    // echo $survey_question_answers;
                   
                    ?>
                
                    <li><span class="font-weight-bold null-font-family text-primary"><?php echo $survey_question_options[$i] ?> <i class="fa fa-check"></i></span></li>
                                                        
            <?php 
                } else {
                    ?>
                        <!-- <li><?php echo $survey_question_options[$i] ?></li> -->
                    <?php    
                }
            }
        }
        
    } else {
        $question_single_answers = str_replace(array('[', ']',), '', $survey_question_answers);
        echo $question_single_answers;
    }
    

} else {

    if (in_array($survey_question_answers, $survey_question_options)) {
        for ($i=0; $i < sizeof($survey_question_options); $i++) { 
            // echo $survey_question_options[$i]."<br/>";
            if ($survey_question_options[$i] == $survey_question_answers) {
                // echo $survey_question_answers;
               
                ?>
            
                <li><span class="font-weight-bold null-font-family text-primary"><?php echo $survey_question_options[$i] ?> <i class="fa fa-check"></i></span></li>
                                                    
            <?php 
            } else {
                ?>
                    <li><?php echo $survey_question_options[$i] ?></li>
               
                                                        
            <?php    
            }
            
        }
    } else {
        echo $survey_question_answers;
    }

    

}


?>
    </ul>
    
</div>
<?php

}
?>
                                            <!-- <div class="text-center">
                                                <form>
                                                    <div class="d-none">
                                                        <input type="hidden" id="user_id" value="<?php echo $user_id ?>">
                                                        <input type="hidden" id="survey_id" value="<?php echo $survey_id ?>">
                                                        <input type="hidden" id="amount" value="4000">
                                                    </div>
                                                    <button class="btn btn-danger" type="">Decline</button>
                                                    <button id="validateSurvey" class="btn btn-primary" type="">Validate</button>
                                                </form>
                                            </div> -->
                                            
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
