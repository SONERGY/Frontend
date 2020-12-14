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
                                <div class="col-xl-4 prl">
                               
                                    <div class="crypto-overview-wrapper">
                                        <h2 class="crypto-stitle">My Wallet</h2>
                                        <div class="crypto-overview">
                                            <div class="crypto-current-balance">
                                                <span>Your Current Balance</span>
                                                <h3 class="ccb"> <span class="ethBalance">0.00</span> <small><b>ETH</b></small></h3>
                                                <p>Sonergy Balance</p>
                                                <p><span class="tokenBalance">0.00</span> <small><b>SNGY</b></small></p>
                                                <p class="crypto-stitle"> <span class="ethAddress"></span></p>
                                                <a href="#" class="btn-style-a">Buy More SNGY</a>
                                               
                                            </div>
                                        </div>
                                        <div class="crypto-overview text-center overlay-wallet-connector">
                                    <a href="#" onclick="connectWallet()" class="btn-style-b">Connect</a>
                                    <p><small>Click connect to connect to your wallet provider</small></p>
                                    </div>
                                    </div>
                                  

                                </div>
                                <div class="col-xl-8">
                                    <div class="crypto-wallet">
                                        <h2 class="crypto-stitle">Account Statistics</h2>
                                        
                                        <div class="crypto-wallet-tab ">
                                               <div class="tab-content py-3 px-3 px-sm-0 cw-tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-bitcoin" role="tabpanel" aria-labelledby="nav-bitcoin-tab">
                                                    <div class="crypto-single-wallet">
                                                        <h3>Total Earnings<span></span></h3>
                                                        <h5><span id="sngy"></span> <small><b>SNGY</b></small></h5>
                                                        <ul class="market-info">
                                                            <li>
                                                                <span>Completed Surveys</span>
                                                                <h4 id="completed_surv"></h4>
                                                                <span>Surveys Rewards</span>
                                                                <span><span id="surv_rw" class="d-inline-block my-0"></span> <small><b>SNGY</b></small></span>
                                                            </li>
                                                            <li>
                                                                <span>My Surveys</span>
                                                                <h4 id="mySurv"></h4>
                                                                <span>Amount Spent</span>
                                                                <span><span id="am_sp" class="d-inline-block my-0"></span> <small><b>SNGY</b></small></span>
                                                            </li>
                                                            <li>
                                                                <span>Referrals</span>
                                                                <h4 id="referals_count"></h4>
                                                                <span>Earnings</span>
                                                                <span><span id="referal_bal" class="d-inline-block my-0"></span> <small><b>NGN</b></small></span>
                                                            </li>
                                                            <li>
                                                                <span>Survey Validated</span>
                                                                <h4 id="validSurv"></h4>
                                                                <span>Earnings</span>
                                                                <span><span id="valid_rw" class="d-inline-block my-0"></span> <small><b>SNGY</b></small></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                    
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="recent-transaction-history">
                                        <h2 class="crypto-stitle">Current Surveys</h2>
                                        <div class="rth-table">
                                            <table class="table cryptodash-tableA">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>Creator</th> -->
                                                        <th>Title</th>
                                                        <th>Start Date</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="display-survey">

                                                </body>
                                                <!-- <tr>
                                                    <td colspan="5">
                                                        <p class="text-center">No survey yet <br/> <a href="/survey/new" class="btn btn-primary"> Add survey</a> </p>
                                                       
                                                    </td>
                                                 
                                                </tr> -->
                                               
                                              
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="transaction-status">
                                        <h2 class="crypto-stitle">Survey Stats</h2>
                                        <div class="transaction-status-pie">
                                            <canvas id="pie1" data-p1value="25, 25, 15, 35" data-p1label="In Progeress, In Pending, Cancelled, Completed" data-p1color="#372CC8, #FFA726, #E91E63, #2ACD72" width="420" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="tokenCalculation-wrapper">
                                        <h2 class="crypto-stitle">Survey Calculator</h2>
                                        <div class="token-calculator">
                                            <form class="tc-form">
                                                <h4>Start Date</h4>
                                                <div class="input mb-4">
                                                <input lass="" id="input-calc-start_date" width="276" />
                                                
                                                    
                                                </div>
                                                <h4>End Date</h4>
                                                <div class="input">
                                                <input lass="" id="input-calc-end_date" width="276" />
                                                    
                                                </div>
                                                <h3>= 0.00  <span class="currencyName"><small><b>SNGY</b></small></span></h3>
                                                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i>The Amount is changeable anytime</p>
                                                <a href="#" class="btn-style-b">Calculate</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="token-distribution-wrapper">
                                        <h2 class="crypto-stitle">Earnings</h2>
                                        <div class="distribution-graph">
                                            <!-- <canvas id="chart"></canvas> -->
                                            <div class="chart-container">
                                                <canvas id="chart-token-distribution" data-ctdlabel="Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec" ></canvas>
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
    
    <script src="/public/static/js/sum.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/count_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/amount_stat.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/static/js/published-surveys.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/published-events.js?v=<?php echo STATIC_VERSION ?>"></script>
    <!-- <script src="/public/static/js/unique-survey.js?v=<?php echo STATIC_VERSION ?>"></script> -->
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
