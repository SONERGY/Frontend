<?php
if (isset($_COOKIE['refer'])) {
  $refer = $_COOKIE['refer'];
} else {
  $refer = "";
}


?>
<?php require_once("public/page-parts/new/hearder.php") ?>

<div id="preloader"></div>


<div class="login-register-wrapper">
    <div class="container">
        <div class="lr-box">
        <div id="msg-div2">

</div>
            <div class="row" id="user_register_form_wrapper">
                <div class="col-md-6">
                    <div class="lr-img">
                        <img src="/public/assets/img/bg/login-reg.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="lr-form">
                        <form id="user_register_form">
                        <h3>Sign Up!</h3>
                        <p>Enter your login details here!</p>
                        <div class="crypto-form">
                            <div class="cfi">
                             
                                <input id="referal" name="referal" type="hidden" value="<?php echo $refer; ?>">
                            <input id="username" type="text" name="username" placeholder="Username" >
                     
                            </div>
                            <div class="cfi">
                            <input id="email" type="email" name="email" placeholder="Email Address" >

                            </div>
                            <div class="cfi">
                            <input id="password" type="password" name="password" placeholder="Password" >

                            </div>
                            <div class="cfi">
                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" >
                            </div>
                            <div id="msg-div">

                    </div>
                            <button type="submit" id="signup_trigger_button" class="cfi-button">
                                Create your account
                            </button>
                           
                        </div>
                        </form>
                    </div>
                   
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php require_once("public/page-parts/new/footer-js.php") ?>
<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>""></script>
<script src="/public/static/js/user.js?v=<?php echo STATIC_VERSION ?>"></script>