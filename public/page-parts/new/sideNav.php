

<div class="crypto-dash-sidenav">
<div id="sideNavWrapper" class="active">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
<?php

if(isset($_COOKIE['user_type']) && ($_COOKIE['user_type'] == 'admin')) {
// echo $_COOKIE['user_type'];
?>
<nav class="sidebar-nav">
                        <ul class="metismenu" id="menu3">
                            <li class="mm-active">
                                <a href="/tagapanga">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span class="msm-text">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="/survey/completed_surveys/">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <span class="msm-text">Completed Surveys</span>
                                </a>
                            </li> 

                            <li class="">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fa fa-free-code-camp" aria-hidden="true"></i>
                                    <span class="msm-text">Survey Plans</span>
                                    
                                </a>
                                <ul class="mm-has-child mm-collapse" style="height: 0px;">
                                    <li><a href="/plans/">Edit Plans</a></li>
                                    <li><a href="/plans/">View Plans</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="/logout">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span class="msm-text">Sign Out</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
<?php
} else {
?>
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="menu3">
                            <li class="mm-active">
                                <a href="/account">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span class="msm-text">Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="/survey/new/">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    <span class="msm-text">Create Survey</span>
                                </a>
                            </li> 

                            <li>
                                <a href="/survey/my_surveys/">
                                    <i class="fas fa-poll-h" aria-hidden="true"></i>
                                    <span class="msm-text">My Surveys</span>
                                </a>
                            </li> 

                            <!-- <li class="">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fas fa-poll-h" aria-hidden="true"></i>
                                    <span class="msm-text">Surveys</span>
                                    
                                </a>
                                <ul class="mm-has-child mm-collapse" style="height: 0px;">
                                    <li><a href="/survey/my_surveys/">My Surveys</a></li>
                                    <li><a href="/transactions/ngn">Answered Surveys</a></li>
                                </ul>
                            </li> -->

                            <!-- <li>
                                <a href="/kyc">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <span class="msm-text">KYC</span>
                                </a>
                            </li>  -->
                           
                            <li class="">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fas fa-money-bill-wave" aria-hidden="true"></i>
                                    <span class="msm-text">All Withdrawal</span>
                                    
                                </a>
                                <ul class="mm-has-child mm-collapse" style="height: 0px;">
                                    <li><a href="/transactions/sngy">SNGY Withdrawal</a></li>
                                    <li><a href="/transactions/ngn">NGN Withdrawal</a></li>
                                    
                                </ul>
                            </li>
                            <?php

                                if(isset($_COOKIE['user_type']) && ($_COOKIE['user_type'] == 'validator')) {
                                // echo $_COOKIE['user_type'];

                            ?>
                            <li>
                                <a href="/validation/">
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                    <span class="msm-text">Validate Survey</span>
                                </a>
                            </li> 
                            <?php
                                }
                            ?>
                            <li>
                                <a href="/logout">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span class="msm-text">Sign Out</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
<?php
}
?>
                </div>
                <!-- /Sidebar -->