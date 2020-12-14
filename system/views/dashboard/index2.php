<?php require_once "public/page-parts/site-header-dashbord.php" ?>


<style>
    #refer {
        display: none;
    }

    #referLink {
        display: none;
    }
</style>
<section class="py-5">
    <div class="row">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                        <h6 class="mb-0">Completed Surveys</h6><span class="text-gray">0</span>
                    </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-poll-h"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                        <h6 class="mb-0">My Surveys</h6><span class="text-gray">0</span>
                    </div>
                </div>
                <div class="icon text-white bg-green"><i class="fas fa-poll-h"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                        <h6 class="mb-0">Referrals</h6><span class="text-gray" id="referals_count"></span>
                    </div>
                </div>
                <div class="icon text-white bg-blue"><i class="fas fa-retweet"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                        <h6 class="mb-0">Reward Balance</h6><span class="text-gray">0 </span>
                    </div>
                </div>
                <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <img class="img-fluid" src="/public/static/assets/logos/giftbox.png" width="80">
                <h3 class="mt-4">Refer your friends, & get 80% cashback!</h3>
                <div id="refer">
                    <a href="#" class="navbar-btn btn btn-success my-3" data-toggle="modal" data-target="#getReferal">Get referal link</a>
                </div>
                <div id="referLink">
                    <span class="text-success">My Referal Link:</span>
                    <div class="col-md-6" style="margin: 0 auto;">
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="referral_link_textbox">
                            <div class="input-group-append">

                                <button class="btn btn-sm btn-info" id="referral_link_btn" data-clipboard-target="#referral_link_textbox"><i class="fas fa-copy mx-1"></i>Copy</button>
                            </div>
                        </div>

                    </div>


                </div>
                <!--<h5 class="text-muted">Share on social media</h5>
                <div class="col-md-4 offset-md-4">
                    <div class="row align-items-center justify-content-center mt-3">
                        <img src="/public/static/assets/socials/facebook.png" class="img-fluid mx-auto" width="35" alt="">
                        <img src="/public/static/assets/socials/twitter.png" class="img-fluid mx-auto" width="35" alt="">
                        <img src="/public/static/assets/socials/instagram.png" class="img-fluid mx-auto" width="35" alt="">
                        <img src="/public/static/assets/socials/linkedin.png" class="img-fluid mx-auto" width="35" alt="">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-md-12">
            <!-- <h4 class="text-center">Published Surveys</h4> -->
            <!-- <div id="display-survey" class="my-3">
                
            </div> -->
            <div class="row" id="display-survey">
                
            </div>
        </div>
        <div class="col-md-12">
            <!-- <h4 class="text-center">Published Events</h4> -->
            <!-- <div id="display-event" class="my-3">
                
            </div> -->
            <div class="row" id="display-event">
                
            </div>
        </div>
    </div>
</section>

<!-- All Brand Modal -->
<div class="modal fade" id="getReferal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog brand-modal" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Brands</h5>
            </div> -->
            <div class="modal-body" id="payment-referral-dailog">
                <h1 class="text-center">Refer & Earn</h1>
                <p class="text-center">Give friends $10 bonus with your referral link. you'll get a 8$ for each friends that subscribe</p>
                <div class="col text-center">
                    <input type="hidden" id="email1" value="">
                    <input type="hidden" id="amount" value="3620">
                    <input type="hidden" id="paymenttype" value="referal">
                    <button class="btn btn-success" id="payWithPaystack" onclick="payWithPaystack()" id="">Give & Get Referral Link</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "public/page-parts/footer.php" ?>
<!-- <script src="/public/static/js/count-referal.js"></script> -->
<script src="/public/static/js/published-surveys.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/published-events.js?v=<?php echo STATIC_VERSION ?>"></script>


