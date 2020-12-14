<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sonergy - The best survey system around the world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->

    <link rel="stylesheet" href="/public/static/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/public/static/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/public/static/custom/css/style.dashboard.css?v=<?php echo STATIC_VERSION ?>" id="">
    <link rel="stylesheet" href="/public/static/custom/css/jquery.dataTables.min.css?v=<?php echo STATIC_VERSION ?>">
    <link rel="stylesheet" href="/public/static/custom/css/bootstrap-datepicker.css?v=<?php echo STATIC_VERSION ?>">
    <!-- Custom stylesheet - for your changes-->

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <link rel="stylesheet" href="css/custom.css?v=<?php echo STATIC_VERSION ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?v=<?php echo STATIC_VERSION ?>">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="/account/" class="navbar-brand font-weight-bold text-uppercase text-base">Sonergy Back Office</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">

                <li class="nav-item dropdown mr-3"><a id="notifications" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
                    <div aria-labelledby="notifications" class="dropdown-menu">
                        <!-- <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                                <div class="text ml-2">
                                    <p class="mb-0">You have 2 followers</p>
                                </div>
                            </div>
                        </a> -->
                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
                    </div>
                </li>
                <li class="nav-item dropdown ml-auto"><a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="/public/static/assets/logos/user.png" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                    <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family" id="user_name"></strong></a>
                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log </a>
                        <div class="dropdown-divider"></div><a href="login.html" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>