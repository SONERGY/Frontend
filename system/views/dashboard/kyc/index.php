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
                          <div class="col-xl-6">
                              <div class="cc-wrapper element-margin">
                                  <h3>Profile Picture</h3>
                                  <div class="text-center profile_img" id="profile_img">

                                    <!-- <img id="actual_img" class="img-circle" src="/public/assets/img/848043.svg" width="80" alt="Profile picture"> -->

<?php

if(isset($_COOKIE['profile_img'])) {
// echo $_COOKIE['user_type'];

?>
                            <img class="img-circle" src="/<?php echo $_COOKIE['profile_img']; ?>"  width="80" alt="Profile picture">
<?php

} else {
?>

                            <img class="img-circle" src="/public/assets/img/848043.svg"  width="80" alt="Profile picture"> 

<?php
}
// echo $_COOKIE['user_type'];
?>

                                  </div>
                                  <div class="cc-box">
                                    <div id="1msg-div">
                                      
                                    </div>
                                        <form id="profile-form">
                                            <div class="cciu">
                                                <label for="i-file-upload" class="i-custom-file-upload">
                                                    <i class="fa fa-image" aria-hidden="true"></i>
                                                    <span class="h4"><div class="d-inline-block" id="pro-action"></div> profile picture</span><span>JPG or PNG l Max of 60KB</span>
                                                    <!-- <span class="p">National Id, Passport or Driving License</span> -->
                                                </label>
                                                <input type="hidden" value="" class="auth_code" name="code" id="auth_code">
                                                <input id="i-file-upload" name="file1" type="file">
                                            </div>
                                            <button class="cfi-button mt-3" id="uppload" type="submit">Submit</button>
                                        </form>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="cc-wrapper element-margin">
                                  <h3>Verification Document</h3>
                                  <div class="text-center document_img" id="document_img">
                                  <?php

if(isset($_COOKIE['document_img'])) {

?>
                            <img class="img-circle w-50" src="/<?php echo $_COOKIE['document_img']; ?>" alt="Profile picture">
<?php

} 
?>
                                  </div>
                                  <div class="cc-box">
                                    <div id="2msg-div">
                                        
                                    </div>
                                        <form id="document-form">
                                            <div class="cciu">
                                                <label for="2i-file-upload" class="i-custom-file-upload">
                                                    <i class="fa fa-image" aria-hidden="true"></i>
                                                    <span class="h4">Upload document</span><span>JPEG or PNG l Max of 60KB</span>
                                                    <!-- <span class="p">National Id, Passport or Driving License</span> -->
                                                </label>
                                                <input type="hidden" value="" class="auth_code" name="code" id="auth_code">
                                                <input id="2i-file-upload" name="documents" type="file">
                                            </div>
                                            <button class="cfi-button mt-3" id="uppload2" type="submit">Submit</button>
                                        </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                      <div class="row">
                          <div class="col-xl-6">
                              <div class="crypto-form-wrapper">
                                  <h3>Update Your Password</h3>
                                  <!-- <form class="crypto-form" id="form" method="post" enctype="multipart/form-data"> -->
                                  <form class="crypto-form" id="form">
                                    <div id="warningMsg">
                                      
                                    </div>
                                      <!-- <div class="cfi">
                                          <label for="old_password">Old Password</label>
                                          <input type="text" name="op" id="old_password" placeholder="Enter your old password">
                                      </div> -->
                                      <div class="cfi">
                                          <label for="new_password">New Password</label>
                                          <input type="hidden" value="" class="auth_code" name="code" id="auth_code">
                                          <input type="text" name="newPassword" id="new_password" placeholder="Enter your new password">
                                      </div>
                                      <div class="cfi">
                                          <label for="confirmNewPassword">Confirm New Password</label>
                                          <input type="text" name="confirmPassword" id="confirmPassword" placeholder="Enter your new password again to confirm it">
                                      </div>
                                      <button id="changebtn" type="submit" name="updatePassword" class="cfi-button">Update Password</button>
                                  </form>
                              </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="crypto-form-wrapper">
                                  <h3>Change Username</h3>
                                  <form id="usernameForm" class="crypto-form">
                                    <div id="warningMsg2">
                                      
                                    </div>
                                      <div class="cfi">
                                          <label for="newUsername">Enter New Username</label>
                                          <input type="hidden" name="oldUsername" id="oldUsername" value="<?php echo $_COOKIE['user_name']; ?>">
                                          <input type="text" name="newUsername" id="newUsername" placeholder="Enter new username">
                                      </div>
                                      <div class="cfi">
                                          <label for="confirmUsername">Confirm New Username</label>
                                          <input type="text" name="confirmUsername" id="confirmUsername" placeholder="Confirm new username">
                                      </div>
                                      
                                      <button type="submit" name="updateUsername" id="updateUsername" class="cfi-button">Update Username</button>
                                  </form>
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
    
    <script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    <script src="/public/assets/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
    <!-- <script src="/public/assets/js/blockchain.js" type="text/javascript"></script> -->
    <script src="/public/static/js/change-password.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/change-username.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/change-profile-img.js?v=<?php echo STATIC_VERSION ?>"></script>
    <script src="/public/static/js/add-document.js?v=<?php echo STATIC_VERSION ?>"></script>
    
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
