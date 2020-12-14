<?php require_once("public/page-parts/site-header.php") ?>

<?php

if (isset($data['success'])) {
?>
  <div class="jumbotron text-center">

    <h1 class="display-3"><img src="/public/static/assets/logos/logo.png" alt="" style="height: 80px; margin: 0 auto;" class="img-fluid mb-2  d-md-block fas fa-spin">Thank You!</h1>
    <p class="lead">Your account activation was successful.</p>
    <hr>
    <p>
      Having trouble? <a href="">Contact us</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>
    </p>
  </div>
<?php
} else if (isset($data['error'])) {
?>
  <div class="jumbotron text-center">

    <h1 class="display-3"> <img src="/public/static/assets/logos/logo.png" alt="" style="height: 80px; margin: 0 auto;" class="img-fluid mb-2  d-md-block fas fa-spin">
      Sorry!</h1>
    <p class="lead"><strong>We</strong> could not activate your account .</p>
    <hr>
    <p>
      Having trouble? <a href="">Contact us</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>
    </p>
  </div>
<?php
}


?>

</div>
</div>
<div class="overlay"></div>




<script src="/public/static/js/app.js?v=<?php echo STATIC_VERSION ?>""></script>

</body>
<script src="/public/static/js/user.js?v=<?php echo STATIC_VERSION ?>"></script>

</html>