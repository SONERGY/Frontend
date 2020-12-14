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
                        <form action="#" id="user_login_form">
                            
                            <div class="lr-form login-form">
                                <h3>Login Now!</h3>
                                <p>Enter your login details here!</p>
                                <div class="crypto-form">
                                    <div class="cfi">
                                        <input  id="email" type="email" name="email" placeholder="Email address" >
                                    </div>
                                    <div class="cfi">
                                        <input type="password" name="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div id="msg-div"></div>
                                <div class="needac-forgetpass">
                                    <a class ="lfpass" href="/user/forgot">Forget Password ?</a>
                                    <a class ="needacc" href="/user/register">Need Account ?</a>
                                </div>
                                <button type="submit" id="login_trigger_button" class="cfi-button">Login</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require_once("public/page-parts/new/footer-js.php") ?>
<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>""></script>
<script src="/public/static/js/user.js?v=<?php echo STATIC_VERSION ?>"></script>