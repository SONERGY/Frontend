<?php require_once "public/page-parts/site-header-dashbord.php" ?>


<!-- <script src="https://js.paystack.co/v1/inline.js"></script>
 -->

<section class="py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-xl-0">
            <div class="bg-white shadow roundy p-5">
                <div id="warningMsg">
                    
                </div>
                <form id="form">
                    <div class="form-group">
                        <label for="question_title"><b>New password</b></label>
                        <input type="hidden" name="code"  id="useremail">
                        <input type="text" name="newPassword" placeholder="New password..." required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="question_title"><b>Confirm password</b></label>
                        <input type="text" name="confirmPassword" placeholder="Confirm password..." required class="form-control">
                    </div>
                    <button class="btn btn-secondary" id="changebtn" type="submit"> Change</button>
                </form>
                <div id="resultMsg">
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once "public/page-parts/footer.php" ?>
<script>
$(document).ready(function (){

    var user_infos = user_info();

    var auth_code = user_infos.auth_code;

    // console.log(auth_code);
    
    $("#useremail").val(auth_code);


});
</script>


<script src="/public/static/js/change-password.js?v=<?php echo STATIC_VERSION ?>""></script>

