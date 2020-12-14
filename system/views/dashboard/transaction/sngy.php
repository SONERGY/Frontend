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
                                        <h2 class="crypto-stitle">SNGY Withdrawals</h2>
                                        <div class="transaction-details-table">
                                            <table class="tdt">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Wallet Address</th>
                                                        <th>Status</th>
                                                        <th>Amount</th>
                                                        <th>withdrawal Date</th>
                                                        <th>Is Verified</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
// echo "<pre>";

// var_dump($data);
// echo "</pre>";

if (empty($data)) {
?>
    <td colspan="6" class="text-center">No Data to Display</td>
<?php
    } else {

        $number = 1;
        foreach ($data as $key => $value) {
        $wallet_id = $value['trxref'];
        $status = $value['status'];
        $amount = $value['amount'];
        $withdrawal_date = $value['date'];
        $is_verified = $value['is_verified'];
        //   echo $is_verified;
        
        $pieces = explode(" ", $withdrawal_date);
        
        
        if ($is_verified === null) {
            $verification = '<i class="fa fa-times-circle text-danger" aria-hidden="true"></i>';
            } else {
            $verification = '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>';
        }
        
        
        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $number++ ?></td>
                                                            <td><?php echo $wallet_id ?></td>
                                                            <td><?php echo $status ?></td>
                                                            <td><?php echo round($amount) ?></td>
                                                            <td><?php echo $pieces[0] ?></td>
                                                            <td><?php echo $verification ?></td>
                                                        </tr>
    <?php
    }
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
    
    <script src="/public/static/js/sum.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/count_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/amount_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
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
