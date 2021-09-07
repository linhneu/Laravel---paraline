<?php
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Components Documentation - Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../css/demo.css" rel="stylesheet" />
    <link href="../css/bootstrap.css" rel="stylesheet" />

    <link href="../css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/login-register.js" type="text/javascript"></script>

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <style>
        pre.prettyprint {
            background-color: #eee;
            border: 0px;
            margin-bottom: 60px;
            margin-top: 0px;
            padding: 20px;
            text-align: left;
        }

        .atv,
        .str {
            color: #05AE0E;
        }

        .tag,
        .pln,
        .kwd {
            color: #3472F7;
        }

        .atn {
            color: #2C93FF;
        }

        .pln {
            color: #333;
        }

        .com {
            color: #999;
        }

        .space-top {
            margin-top: 50px;
        }

        .btn-primary .caret {
            border-top-color: #3472F7;
            color: #3472F7;
        }

        .area-line {
            border: 1px solid #999;
            border-left: 0;
            border-right: 0;
            color: #666;
            display: block;
            margin-top: 20px;
            padding: 8px 0;
            text-align: center;
        }

        .area-line a {
            color: #666;
        }

        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }

        .table-shopping .td-name {
            min-width: 130px;
        }

        .pick-class-label {
            border-radius: 8px;
            border: 1px solid #E3E3E3;
            color: #ffffff;
            cursor: pointer;
            display: inline-block;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            margin-right: 10px;
            padding: 23px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap;
        }
    </style>
</head>

<body class="documentation">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="purple">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../img/full-screen-image-3.jpg')">
                <div class="filter" style=" margin-top: -100px"></div>
                <div class="title-container text-center">
                    <h3> Login with </h3>
                    <div class=" login" style="width: 30%; margin-left: auto; margin-right: auto  ">
                        <div class="dialog login animated">
                            @if (Session::has('messages'))
                            <p class="text-danger text-center">
                                {{ Session::get('messages') }}
                            </p>
                            @endif
                            <div class="content">
                                <div class="box">
                                    <div class="content">
                                        <div class="social">
                                            <a class="circle github" href="#">
                                                <i class="fa fa-github fa-fw"></i>
                                            </a>
                                            <a id="google_login" class="circle google" href="#">
                                                <i class="fa fa-google-plus fa-fw"></i>
                                            </a>
                                            <a id="facebook_login" class="circle facebook" href="#">
                                                <i class="fa fa-facebook fa-fw"></i>
                                            </a>
                                        </div>
                                        <div class="division">
                                            <div class="line l"></div>
                                            <span>or</span>
                                            <div class="line r"></div>
                                        </div>
                                        <div class="error"></div>
                                        <div class="form ">
                                            <form method="post" action="" accept-charset="UTF-8">
                                                @csrf
                                                <input id="email" class="form-control" style="color: white" type="text" placeholder="Email" name="email">
                                                <input id="password" class="form-control" style="color: white" type="password" placeholder="Password" name="password">
                                                <input class="btn btn-default btn-login" type="submit" value="Login">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="description text-center">Since 2021</h4>
                    <br />
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../js/core/popper.min.js" type="text/javascript"></script>
<script src="../js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>
<script>
    var header_height;
    var fixed_section;
    var floating = false;

    $(document).ready(function() {
        suggestions_distance = $("#suggestions").offset();
        pay_height = $('.fixed-section').outerHeight();

    });
</script>

</html>