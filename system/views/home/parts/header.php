<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($pageTitle) ?  $pageTitle : "Distributed Researchers Network" ?></title>
  <meta name="description" content="Sonergy research assists and connects businesses to markets and researchers in order to gather useful and factual insights to inform their business strategies.">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <meta name="robots" content="all,follow">
  <meta charSet="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta property="og:image" content="https://sonergy.io/public/assets/img/socialLogo.png" />
<meta property="og:image:type" content="image/png" />
<!-- <meta property="og:image:width" content="600" />
<meta property="og:image:height" content="315" /> -->
<meta property="og:site_name" content="Sonergy" />
<meta property="og:type" content="website" />
<meta name="twitter:card" content="summary_large_image" />
<meta property="og:url" content="https://sonergy.io/" />
<link rel="canonical" href="https://sonergy.io/" />
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="/public/static/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- Ionicons CSS-->

  <link rel="stylesheet" href="/public/static/custom/css/ionicons.min.css">
  <!-- Device mockups CSS-->
  <link rel="stylesheet" href="/public/static/custom/css/device-mockups.css">
  <!-- Google fonts - Source Sans Pro-->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700"> -->
  <!-- Swiper sLider-->
  <link rel="stylesheet" href="/public/static/node_modules/swiper/css/swiper.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="/public/static/custom/css/style.default.css?v=<?php echo STATIC_VERSION ?>" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="/public/static/custom/css/custom.css?v=<?php echo STATIC_VERSION ?>">
  <link rel="stylesheet" href="/public/assets/css/footer.css?v=<?php echo STATIC_VERSION ?>">
  
  <link rel="stylesheet" href="/public/static/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  
  <!-- Favicon-->
  <link rel="apple-touch-icon" sizes="57x57" href="/public/static/assets/logos/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/public/static/assets/logos/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/public/static/assets/logos/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/public/static/assets/logos/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/public/static/assets/logos/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/public/static/assets/logos/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/public/static/assets/logos/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/public/static/assets/logos/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/public/static/assets/logos/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/public/static/assets/logos/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/public/static/assets/logos/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/public/static/assets/logos/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/public/static/assets/logos/favicons/favicon-16x16.png">
<link rel="manifest" href="/public/static/assets/logos/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/public/static/assets/logos/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <style>
    .list-inline-item:not(:last-child) {
      margin-right: 0px;
    }
    .navbar-brand{
      z-index: 2000;
    }
  </style>
  <!-- navbar-->
  <header class="header page-holder">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <!-- Navbar brand--><a href="/" class="navbar-brand font-weight-bold"><img src="/public/static/assets/logos/logo.png" class="" style="height: 60px;" class="img-fluid"> <span style="color: #377754;"></span></a>
        <!-- Navbar toggler button-->
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="icon ion-md-list ml-2"></i></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto ml-auto">
            <!-- Link-->

          </ul>
          <ul class="navbar-nav">
            <!-- <li class="nav-item"><a href="/user" class="nav-link mr-3"><i class="fas fa-users"></i> Our Team</a></li> -->
            <!-- <li class="nav-item"><a href="/user" class="nav-link mr-3"><i class="fas fa-hand-holding-usd"></i> Earn</a></li> -->

            <li class="nav-item"><a href="/home#how-it-works" class="nav-link mr-3"><i class="fas fa-code-branch"></i> How it works</a></li>
            <li class="nav-item"><a href="/home#roadmap" class="nav-link mr-3"><i class="fas fa-road"></i> Roadmap</a></li>
            <!-- <li class="nav-item"><a href="/user" class="nav-link mr-3"><i class="fas fa-file-word"></i> Contact us</a></li> -->
            <li class="nav-item"><a href="/user" class="nav-link mr-3"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li class="nav-item"><a href="/user/register" class="navbar-btn btn btn-primary">Sign Up</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>