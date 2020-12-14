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
                                <div class="col-xl-6 offset-xl-3 prl">
                               
                                    <div class="crypto-overview-wrapper">
                                      <h2 class="crypto-stitle" id="survey_title"></h2>
                                      <div class="questions-overview text-center">
                                        <h5 class="modal-title mx-auto"><span class="active-question" id="active-question"></span> of <span class="allQuestions" id="allQuestions"></span></h5>
                                        <div id="msg-div"></div>
                                        <div id="startPage">
                                            <h2 class="text-center font-weight-light" id="survey_title"></h2>
                                            <div class="text-center my-4">
                                                <button type="button" id="survey-start" class="btn btn-success rounded-pill"> START</button>
                                            </div>
                                        </div>
                                        <form class="questions_form" id="questions_form">
                                            <div class="question_preview_form">
                                            
                                            </div>
                                            <div class="text-center">
                                            <input type="hidden" id="inputType" class="inputType" name="input_type" value="">
                                            <input type="hidden" id="questionId" class="questionId" name="questionId" value="">
                                            <input type="hidden" id="dataType" class="dataType" name="data_type" value="">
                                            <button class="btn-style-b-small text-center" id="prev_q" type="button"><i class="fa fa-arrow-left"></i> PREV QUESTION</button>
                                            <button class="btn-style-a-small text-center" id="answer_q" type="button">NEXT QUESTION <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </form>
                                        <div id="endPage">
                                        <div class="text-center">
                                            <img class="img-fluid my-3" src="/public/static/assets/img/like.png" width="100" alt="">
                                            <h3 class="font-weight-light">Congratulations!</h3>
                                            <p>Get the best information you need to make better decisions about your survey.</p>
                                            <a class="btn btn-success" href="/account/">Continue</a>
                                        </div>
                                        </div>
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
    <script src="/public/static/js/sum.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/count_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/amount_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/published-surveys.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/published-events.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/unique-survey.js?v=<?php echo STATIC_VERSION ?>"></script>
    
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
