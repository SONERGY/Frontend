<?php require_once("public/page-parts/new/hearder.php") ?>
    <div id="preloader"></div>


    <div class="login-register-wrapper">
        <div class="container">
            <div class="lr-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="lr-img">
                            <img src="/public/assets/img/bg/login-reg.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
     
                        <form action="#" id="form">
                            
                            <div class="lr-form login-form">
                                <h3>Change Password</h3>
                                
                                <div class="crypto-form">
                                    <div class="cfi">
                                    <input type="hidden" value="<?php echo $data; ?>" name="code" id="hiddencode">
                            <input type="password" name="newPassword" placeholder="New password...">
                  
                                    </div>
                                    <div class="cfi">
                            <input type="password" name="confirmPassword" placeholder="Confirm password...">
                                        
                                    </div>
                                </div>
                                <div id="warningMsg">

</div>
                    <button type="submit" id="changebtn" class="cfi-button">
                                Change
                            </button>
                            </div>
                        </form>
                        <div id="resultMsg">

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require_once("public/page-parts/new/footer-js.php") ?>
<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>""></script>
<script src="/public/static/js/change-password.js?v=<?php echo STATIC_VERSION ?>""></script>