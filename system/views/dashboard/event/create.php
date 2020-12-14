<?php require_once "public/page-parts/site-header-dashbord.php" ?>
<!-- include summernote css/js -->
<link rel="stylesheet" href="/public/static/custom/css/bootstrap-select.css">

<!-- <section>

    <form method="post" class="summernote">
        <textarea id="my-summernote" name="editordata"></textarea>
    </form>

</section> -->

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
<div class=" col-md-12 py-5" id="survey-wrapper">

    <div id="loaderDiv">
        <div class="loader"></div>
        <p class="text-center action-txt">Initiating. Please wait...</p>

    </div>


    <div class="row" id="form-wrapper">
        <div class=" mx-auto">
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
                            <i class="fa fa-image"></i>
                            Poster
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

                    <li class="nav-item">
                        <a data-toggle="pill" href="#nav-tab-publish" id="btn-publish" class="nav-link rounded-pill">
                            <i class="fa fa-bullhorn"></i>
                            Publish
                        </a>
                    </li>
                </ul>
                <!-- End -->


                <!-- Credit card form content -->
                <div class="tab-content p-2 col-md-12">
                    <div id="msg-div"></div>
                    <br>
                    <!-- credit card info-->
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <?php require_once "public/page-parts/event-intro.php" ?>

                    </div>
                    <!-- End -->

                    <!-- Paypal info -->
                    <div id="nav-tab-question" class="tab-pane fade">
                        <?php require_once "public/page-parts/event-poster.php" ?>


                    </div>
                    <!-- End -->

                    <!-- bank transfer info -->
                    <div id="nav-tab-preview" class="tab-pane fade">
                        <?php require_once "public/page-parts/event-preview.php" ?>
                    </div>
                    <!-- End -->

                    <!-- bank transfer info -->
                    <div id="nav-tab-payment" class="tab-pane fade">
                        <?php
                        require_once "public/page-parts/event-payment.php"
                        ?>
                    </div>
                    <!-- End -->

                    <!-- bank transfer info -->
                    <div id="nav-tab-publish" class="tab-pane fade">
                        <?php
                        require_once "public/page-parts/event-publish.php"
                        ?>
                    </div>
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
<?php require_once "public/page-parts/footer.php" ?>
<script src="/public/static/custom/js/bootstrap-select.min.js"></script>
<script src="/public/static/js/event-creator.js?v=<?php echo STATIC_VERSION ?>"></script>
<script src="/public/static/js/payment.js?v=<?php echo STATIC_VERSION ?>"></script>


<script>

</script>