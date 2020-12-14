<?php require_once("public/page-parts/new/auth.php") ?>

<?php require_once("public/page-parts/new/hearder.php") ?>
<div id="preloader"></div>

<link href="/public/assets/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Header Area -->
    <header class="cryptodash-header cdh-light">
        <nav class="navbar navbar-expand-lg cryptodash-nav">
            <a class="navbar-brand" href="#">
                <div class="logo">
                    <img src="/public/static/assets/logos/logo.png" alt="" style="height: 65px;" class="img-fluid">
                </div>
            </a>
            <a id="sideNav-toggle" href="#"><span id="main_icon" class="fa fa-bars"></span></a>
            <div class="collapse navbar-collapse right-nav" id="navbarTogglerDemo02">
            
                <!-- <form class="form-inline my-2 my-lg-0 cryptoH-search">
                    <input class="form-control" type="search" placeholder="Search Anything">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form> -->
        
                <ul class="nav navbar-header-nav ml-auto crypto-user-btn">
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="label label-notify b-orange">
                                5
                                <span class="waves"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu pull-right w-sm animated fadeInUp message-note">
                            <li class="p-tb-5">
                                <a href="chat.html">
                                    <div class="clearfix">
                                        <span class="pull-right text-muted small">7 minutes ago</span>
                                        <i class="fa fa-envelope fa-fw"></i>
                                        <span>7 Messages</span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-tb-5">
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-right text-muted small">6 minutes ago</span>
                                        <i class="fa fa-twitter fa-fw"></i>
                                        <span>6 Follower</span>
                                    </div>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="p-tb-5 text-center">
                                <a class="text-btn-note" href="#">
                                    <i class="fa fa-fw fa-bell"></i> See all Notification</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="b-wisteria fa fa-fw fa-envelope-o u-posRelative"></span>
                            <span class="label label-notify b-orange">
                                6
                                <span class="waves"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown w-sm pull-right notification-note">
                            <li class="b-b">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="profile-pic" href="#">
                                            <img class="media-object" src="/public/assets/img/848043.svg" alt="img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <small class="pull-right">2 hours ago</small>
                                            <b>Shahadat Hossain</b>
                                        </h5>
                                        started following
                                        <strong>Zonayed</strong>
                                        <p class="text-muted">2 hours ago at 7:12 pm - 12th March, 2018</p>
                                    </div>
                                </div>
                            </li>
                            <li class="b-b">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="profile-pic" href="#">
                                            <img class="media-object" src="/public/assets/img/848043.svg" alt="img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <small class="pull-right">3 hours ago</small>
                                            <b>Sharifulgr</b>
                                        </h5>
                                        started following
                                        <strong>Zonayed</strong>
                                        <p class="text-muted">2 hours ago at 7:12 pm - 12th March, 2018</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="text-center u-block btn-2-all" href="chat.html">
                                    <i class="fa fa-envelope"></i> Read All Messages
                                </a>
                            </li>
                        </ul>
                        
                    </li> -->
                    <li class="dropdown profile_img">
                        <a class="dropdown-toggle profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
<?php

if(isset($_COOKIE['profile_img'])) {
// echo $_COOKIE['user_type'];

?>
                            <img class="img-circle" src="/<?php echo $_COOKIE['profile_img']; ?>" alt="Profile picture">
<?php

} else {
?>

                            <img class="img-circle" src="/public/assets/img/848043.svg" alt="Profile picture"> 

<?php
}
// echo $_COOKIE['user_type'];
?>
                            
                            
                        </a>
                        <ul class="dropdown-menu animated flipInX pull-right admin-user">
                            <li>
                                <b class="user-display-name"><?= $_COOKIE['user_name']?></b>
                                <!-- <a href="#">Profile</a> -->
                            </li>
                            <li>
                                
                            <a href="/kyc"><i class="fa fa-user-secret" aria-hidden="true"></i> KYC</a> 
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/logout"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- /Header Area -->