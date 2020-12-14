<?php //require_once "public/page-parts/site-header-dashbord.php" ?>
<!-- include summernote css/js -->

<link rel="stylesheet" href="/public/static/custom/css/bootstrap-select.css">

<style>
    #survey-wrapper .nav-pills .nav-link {
        border-radius: 0 !important;
    }

    #survey-wrapper .rounded-pill {
        border-radius: 0 !important;
    }

    #survey-wrapper .dropdown-toggle {
        color: #212529 !important;
        background-color: #dae0e5 !important;
        border-color: #d3d9df !important;
    }

    #survey-wrapper button {
        outline: none !important;
    }

    #form-wrapper {
        display: none;
    }
</style>
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
                        <div class=" col-md-12 py-5" id="survey-wrapper">

<div id="loaderDiv">
    <div class="loader"></div>
    <p class="text-center action-txt">Initiating. Please wait...</p>

</div>


<div class="row" id="form-wrapper">
    <div class=" col-xl-8 col-md-10 mx-auto">
        <div class="bg-white  shadow-sm ">
            <!-- Credit card form tabs -->
            <ul role="tablist" id="mainTabs" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-card" id="btn-tabcard" class="nav-link active rounded-pill">
                        <i class="fa fa-cog"></i>
                        Configuration
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-question" id="btn-question" class="nav-link  rounded-pill">
                        <i class="fa fa-question"></i>
                        Questions
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-cover" id="btn-cover" class="nav-link  rounded-pill">
                        <i class="fa fa-image"></i>
                        Cover
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-preview" id="btn-preview" class="nav-link rounded-pill">
                        <i class="fa fa-eye"></i>
                        Preview
                    </a>
                </li>

                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-payment" id="btn-payment" class="nav-link rounded-pill">
                        <i class="fa fa-credit-card"></i>
                        Payment
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-publish" id="btn-publish" class="nav-link rounded-pill">
                        <i class="fa fa-bullhorn"></i>
                        Publish
                    </a>
                </li> -->
            </ul>
            <!-- End -->


            <!-- Credit card form content -->
            <div class="tab-content p-4 col-md-12">
                <div id="msg-div"></div>
                <br>
                <!-- credit card info-->
                <div id="nav-tab-card" class="tab-pane fade show active">
                    <?php require "public/page-parts/survey-intro.php" ?>
                </div>
                <!-- End -->

                <!-- Paypal info -->
                <div id="nav-tab-question" class="tab-pane fade">
                    <?php require "public/page-parts/survey-questions.php" ?>
                </div>
                <!-- End -->

                <!-- Paypal info -->
                <div id="nav-tab-cover" class="tab-pane fade">
                    <?php require "public/page-parts/survey-poster.php" ?>
                </div>
                <!-- End -->

                <!-- bank transfer info -->
                <div id="nav-tab-preview" class="tab-pane fade">
                    <?php require "public/page-parts/survey-preview.php" ?>
                </div>
                <!-- End -->

                <!-- bank transfer info -->
                <div id="nav-tab-payment" class="tab-pane fade">
                    <?php
                    require "public/page-parts/survey-payment.php"
                    ?>
                </div>
                <!-- End -->

                <!-- bank transfer info -->
                <!-- <div id="nav-tab-publish" class="tab-pane fade"> -->
                    <?php
                    // require "public/page-parts/survey-publish.php"
                    ?>
                <!-- </div> -->
                <!-- End -->
            </div>
            <!-- End -->

        </div>
    </div>
</div>
</div>
<a href="#" class="d-none" data-toggle="modal" id="trigbtn" data-target="#publishSuccess">success</a>
<div class="modal fade" id="publishSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog brand-modal" role="document">
    <div class="modal-content">
        <div class="modal-body" id="publish-dailog">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="/public/static/node_modules/popper.js/dist/umd/popper.min.js"> </script>

<?php require_once "public/page-parts/new/footer-js.php" ?>
<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
    <script src="/public/assets/js/blockchain2.js?v=<?php echo STATIC_VERSION ?>" type="text/javascript"></script>
    
<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/node_modules/clipboard/dist/clipboard.min.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/localstorage.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/cookie.js?v=<?php echo STATIC_VERSION ?>"></script>


<script src="/public/static/custom/js/bootstrap-select.min.js"></script>
<script src="/public/static/js/payment.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/survey-creator.js?v=<?php echo STATIC_VERSION ?>"></script>



<script>


    var clipboard = new ClipboardJS('.btn');


    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        $("#" + e.trigger.id).html('<i class="fa fa-check mx-1"></i> Copied ')

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
</script>

<script type="text/javascript">


  

    $('.numbersOnly').keyup(function() {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });
</script>

<script>
    /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
        //   console.log(fileName);

    }
    $('#input-calc-start_date').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        
        });
</script>