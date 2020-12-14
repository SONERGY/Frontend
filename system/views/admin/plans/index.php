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
                                <div class="col-xl-12">
                                    <div class="transaction-details-wrapper">
                                        <h2 class="crypto-stitle"><span>Surveys Plans</span><button class="btn float-right btn-primary" onclick="addPlan();" type="button">New Plan <i class="fa fa-plus"></i></button></h2>
                                        <div class="transaction-details-table">
                                            <table class="tdt">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Plan</th>
                                                        <th>Plan Duration</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-body">

                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary d-none" id="editModal" data-toggle="modal" data-target="#exampleModalLong">
                        Launch demo modal
                        </button>
                  </div>
                </div>
                <!-- /Page content -->
              </div>
        </div>
    </div>
    <!-- Dashboard Full Area -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="msg-div"></div>
                    <form id="add-plan">
                        <!-- <div class="form-group">
                            <label for="survey_title">Select Plan</label>
                            <select class="form-control form-control-sm" name="available_plans" id="available_plans">
                                                                                        
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="survey_title">Survey Plan</label>
                            <input type="text" name="survey_plan" id="survey_plan" placeholder="Enter plan name" required class="form-control">
                            <input type="text" name="available_plans" id="available_plans" class="d-none">
                        </div>
                        <div class="form-group">
                            <label for="survey_title">Survey Duration</label>
                            <input type="text" name="survey_duration" id="survey_duration" placeholder="Enter plan duration" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="survey_title">Survey Amount</label>
                            <input type="number" name="survey_amount" id="survey_amount" placeholder="Enter amount" required class="form-control">
                        </div>
                        <button type="submit" id="add-btn" class="btn btn-primary btn-block rounded-pill shadow-sm">Add <i class="fa fa-plus"></i></button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <?php require_once("public/page-parts/new/footer-js.php") ?>
    
    <script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>"" type="text/javascript"></script>
    <script src="/public/static/js/survey-plans.js?v=<?php echo STATIC_VERSION ?>""></script>
    <script src="/public/static/js/add-plan.js?v=<?php echo STATIC_VERSION ?>""></script>
    <script src="/public/assets/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
    <!-- <script src="/public/assets/js/blockchain.js" type="text/javascript"></script> -->
    
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
s