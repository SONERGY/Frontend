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
                                        <h2 class="crypto-stitle">Approved Users</h2>
                                        <div class="transaction-details-table">
                                            <table class="tdt">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Username</th>
                                                        <th>Email Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
// echo "<pre>";

// print_r($data);
// echo "</pre>";
$number = 1;
foreach ($data as $key => $value) {
  $user_name = $value['user_name'];
  $email = $value['email'];
  $id = $value['id'];


  

?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $number++ ?></td>
                                                        <td class="text-center"><?php echo $user_name ?></td>
                                                        <td class="text-center"><?php echo $email ?></td>
                                                        <td><a href="/validation/views/<?php echo $id ?>" class='btn text-white btn-primary'>Completed Surveys</a></td>
                                                    </tr>
<?php
}
?>
                                                </tbody>
                                            </table>
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
    
    <script src="/public/assets/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
    <script src="/public/assets/js/blockchain.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    
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