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
                                <h3>Password Reset</h3>
                                <p>Enter your email!</p>
                                <div class="crypto-form">
                                    <div class="cfi">
                                        <input  id="email" type="email" name="email" placeholder="Email address" >
                                    </div>
                                   
                                </div>
                                <div id="msg-div"></div>
                                <button type="submit" id="submitbtn" class="cfi-button">
                                Reset
                            </button>
                               
                            </div>
                        </form>
                        <div id="resultMsg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require_once("public/page-parts/new/footer-js.php") ?>
<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>""></script>
<script src="/public/static/js/reset-password.js?v=<?php echo STATIC_VERSION ?>""></script>
