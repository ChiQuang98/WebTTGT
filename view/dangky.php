<?php
require_once "../connect/Database.php";
require_once "../model/User.php";
require_once "../model/Receipt.php";
session_start();
if(isset($_SESSION['user'])){//neu dang nhap roi
    header('Location:http://localhost/TTGT/view/admin.php');
    die();
}
$err = "";
$flag = 1;//trang index
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $rsUser = $user->getUserByKey($username,$password);
    if(count($rsUser)>0){
        $_SESSION['user'] = $username;

        header('Location:http://localhost/TTGT/view/admin.php');
        die();
    }
    else{
        $err = "Sai tài khoản hoặc mật khẩu";

        //header('Location:http://localhost/TTGT/index.php');
    }
}
//    $rs = "";
//    if(isset($_GET['keyword'])&&$_GET['keyword']!=""){
//        $receipt = new Receipt();
//        $rs = $receipt->getDataByBKS($_GET['keyword']);
//    }
//    if(isset($_GET['keyword'])){
//        $receipt = new Receipt();
//        $rs = $receipt->getDataByBKS($_GET['keyword']);
//    }
?>
<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Thanh Tra Giao Thông</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/TTGT/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="http://localhost/TTGT/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0; background-color: white">
    <a href="http://localhost/TTGT/index.php"><img src="http://localhost/TTGT/images/logo.jpg" alt="logo" style="position:relative; left:-650px;top: 3px; width: 100px"></a>
    <div style="position:relative;top: -180px; height: 20px" >
        <img src="../images/timeline.jpg" alt="">
    </div>

</div>
<!-- Navigation -->
<nav class="navbar navbar-light" style="background-color:#afd9ee;"  role="navigation">
    <div class="container">
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li >
                    <a <a href="http://localhost/TTGT/index.php"  href="http://localhost/TTGT/view/admin.php">Tra cứu thông tin vi phạm</a>
                </li>
                <li>
                    <a href="http://localhost/TTGT/view/hsvv.php">HỒ SƠ VỤ VIỆC</a>
                </li>
            </ul>
            <!-- Search -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container-fluid">

    <!-- Left Column -->

    <div class="col-sm-9">
        <!-- Alert -->
        <!-- Alert -->
        <div class="alert alert-info" role="alert">
            <label for="" class="glyphicon glyphicon-user"></label>
            <h4 > Đăng ký tài khoản</h4>
        </div>

        <!-- Articles -->
        <div class="row">
            <div class="col-xs-12">
                <style>
                    .divider-text {
                        position: relative;
                        text-align: center;
                        margin-top: 15px;
                        margin-bottom: 15px;
                    }
                    .divider-text span {
                        padding: 7px;
                        font-size: 12px;
                        position: relative;
                        z-index: 2;
                    }
                    .divider-text:after {
                        content: "";
                        position: absolute;
                        width: 100%;
                        border-bottom: 1px solid #ddd;
                        top: 55%;
                        left: 0;
                        z-index: 1;
                    }

                    .btn-facebook {
                        background-color: #405D9D;
                        color: #fff;
                    }
                    .btn-twitter {
                        background-color: #42AEEC;
                        color: #fff;
                    }
                </style>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
                <div class="card bg-light">

                </div> <!-- card.// -->
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
<!--                            <label for="validationDefault01">Họ và Tên</label>-->
<!--                            <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Nhập họ tên" required>-->
                        </div>
                        <div class="col-md-4 mb-3">
                            <article class="card-body mx-auto" style="max-width: 400px;">
                                <h4 class="card-title mt-3 text-center">Create Account</h4>
                                <p class="text-center">Get started with your free account</p>
                                <p>
                                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login with Twitter</a>
                                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login with Facebook</a>
                                </p>
                                <p class="divider-text">
                                    <span class="bg-light">OR</span>
                                </p>
                            </article>
                            <form>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">  </span>

                                    </div>
                                    <div>
                                        <i class="fa fa-user"> Họ và Tên</i>
                                        <input name="" class="form-control" placeholder="Full name" type="text">
                                    </div>

                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">  </span>
                                    </div>
                                    <i class="fa fa-envelope"> Email</i>
                                    <input name="" class="form-control" placeholder="Email address" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">  </span>
                                    </div>
                                    <i class="fa fa-phone"> Số điện thoại</i>
                                    <input name="" class="form-control" placeholder="Phone number" type="text">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">  </span>
                                    </div>
                                    <i class="fa fa-phone"> Số điện thoại</i>
                                    <input name="" class="form-control" placeholder="Phone number" type="text">
                                </div> <!-- form-group// -->

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Create password" type="password">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Repeat password" type="password">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                                </div> <!-- form-group// -->
                                <p class="text-center">Have an account? <a href="">Log In</a> </p>
                            </form>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <!--                            <label for="validationDefault01">Họ và Tên</label>-->
                            <!--                            <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Nhập họ tên" required>-->
                        </div>
                        <div class="col-md-4 mb-3">

                        </div>
                    </div>
            </div>
        </div>
        <hr>
    </div><!--/Center Column-->



    <!-- Right Column -->
    <div class="col-sm-3">

        <!-- Form -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Đăng nhập
                </h3>
            </div>
            <div class="panel-body">
                <form action="http://localhost/TTGT/view/dangky.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="uid" name="username" placeholder="Tài khoản">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-default" name="btnLogin">Đăng nhập</button>
                </form>
            </div>
            <div >
                <h4 class="label label-danger">
                    <?php
                    if($err!=""){
                        echo $err;
                    }

                    ?>
                </h4>


            </div>

        </div>

        <!-- Progress Bars -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-scale"></span>
                    Thống Kê
                </h3>
            </div>
            <div class="panel-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        100% vi phạm được xử lý
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80"
                         aria-valuemin="0" aria-valuemax="100" style="width:80%">
                        80% vi phạm xử lý là người Sơn La
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                         aria-valuemin="0" aria-valuemax="100" style="width:45%">
                        45% số người tái phạm
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="35"
                         aria-valuemin="0" aria-valuemax="100" style="width:35%">
                        35% nộp phạt muộn
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-time"></span>
                    Biểu đồ vi phạm
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TTGT/view/statistic.php">Thống kê vi phạm theo tháng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TTGT/view/bieudoMonth.php">Biểu đồ</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNhatkyhocsinh%2F&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>


    </div><!--/Right Column -->

</div><!--/container-fluid-->

<footer>
    <div class="footer-blurb">
        <div class="container">
            <div class="row">


            </div>
            <!-- /.row -->
        </div>
    </div>

    <div class="small-print">
        <div class="container text text-uppercase text-nowrap text-danger ">
            <span class="glyphicon glyphicon-phone "></span>
            <p > Thanh tra Sở giao thông vận tải Sơn La</p>
            <p > Địa chỉ: số 188 đường Nguyễn Lương Bằng, phường Quyết Thắng, thành phố Sơn La, tỉnh Sơn La</p>
            <p > Điện thoại: 0212 385545454 Fax: 0212 384545455 Emal: Thanhtra.sgtvt@sonla.gov.vn</p>
            <p>Xử lý vi phạm hành chính</p>

        </div>
    </div>


</footer>


<!-- jQuery -->
<script src="http://localhost/TTGT/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="http://localhost/TTGT/js/bootstrap.min.js"></script>

<!-- IE10 viewport bug workaround -->
<script src="http://localhost/TTGT/js/ie10-viewport-bug-workaround.js"></script>

<!-- Placeholder Images -->
<script src="http://localhost/TTGT/js/holder.min.js"></script>

</body>

</html>
