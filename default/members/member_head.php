<?php


  
    include_once "../top.php";
  

include_once "member.php";

$m = new member();

$mem = $m->get_member_by_id($_SESSION["user"]["user_id"]);



?>


<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index-1.htm">
                            <img class="img-fluid" src="..\..\files\assets\images\logo.png" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i
                                                class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i
                                                class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                           
                            <!-- <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li> -->
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../members/member_images/<?= $mem->member_id?>-0.jpg" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span><?= $mem->member_fname ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="../members/member_change_pw.php">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.htm">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>

                                        <li>
                                            <a href="../login/logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
         
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <!--  Dashboard -->

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../members/member_dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>

                            </ul>
                            <!-- Members -->
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                                        <span class="pcoded-mtext">Schedule</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="../shedule/member_schedule.php ">
                                                <span class="pcoded-mtext">My Schedule</span>
                                            </a>
                                        </li>
                                       

                                    </ul>
                                </li>


                            </ul>

                            <!-- TRAINERS -->

                            <!-- <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext">Trainers</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="../Trainers/manage_trainers.php ">
                                                <span class="pcoded-mtext">Manage Trainers</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="../Trainers/add_trainers.php">
                                                <span class="pcoded-mtext "> Add Trainer</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>


                            </ul> -->
                            <!-- Attendance -->
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-clipboard-user"></i></span>
                                        <span class="pcoded-mtext">Attendance</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="../members/view_member_attendence.php ">
                                                <span class="pcoded-mtext">My Attendance</span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>


                            </ul>

                       
                            </ul>


                            <!-- Payment -->
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                                        <span class="pcoded-mtext">Payment</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="../members/member_payment_history.php ">
                                                <span class="pcoded-mtext">My Payment History </span>
                                            </a>
                                        </li>
                                       


                                    </ul>
                                </li>


                            </ul>

                            <!-- Weight -->

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                                        <span class="pcoded-mtext">Weight</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="../weight/add_weight.php ">
                                                <span class="pcoded-mtext">Manage Weight</span>
                                            </a>
                                        </li>
                                        <!-- <li class="">
                                            <a href="../weight/add_weight.php ">
                                                <span class="pcoded-mtext">Add packages</span>
                                            </a>
                                        </li> -->


                                    </ul>
                                </li>


                            </ul>

                            <!-- <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="http://html.codedthemes.com/Adminty/doc" target="_blank">
                                        <span class="pcoded-micon"><i class="fa fa-file-text"></i></i></span>
                                        <span class="pcoded-mtext">Reports</span>
                                    </a>
                                </li>

                            </ul> -->


                            <!-- <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="http://html.codedthemes.com/Adminty/doc" target="_blank">
                                        <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                        <span class="pcoded-mtext">Documentation</span>
                                    </a>
                                </li>

                            </ul> -->
                        </div>
                    </nav>

                    <body>




                    <?php

include_once "../foot.php";
?>