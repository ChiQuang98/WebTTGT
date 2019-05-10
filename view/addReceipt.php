<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location:http://localhost/TTGT/index.php');
    die();
}
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
<nav class="navbar navbar-light" style="background-color:#afd9ee;" role="navigation">
    <div class="container">
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li >
                    <a href="http://localhost/TTGT/view/admin.php">Tra cứu thông tin vi phạm</a>
                </li>
                <li>
                    <a href="http://localhost/TTGT/view/hsvv.php">HỒ SƠ VỤ VIỆC</a>
                </li>
            </ul>
            <!-- Search -->
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Biển số xe">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" ></span> Tìm kiếm</button>
            </form>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container-fluid">

    <!-- Left Column -->


    <!-- Center Column -->
    <div class="col-sm-9">

        <!-- Alert -->
        <div class="alert alert-success alert-dismissible" role="alert">
            <p>Thông tin vi phạm cho người dùng</p>
        </div>

        <!-- Articles -->
        <div class="row">
            <article class="col-xs-12">
                <h2>Premier Niche Markets</h2>
                <p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric "outside the box" thinking. Completely pursue scalable customer service through sustainable potentialities.</p>
                <p><button class="btn btn-default">Read More</button></p>
                <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
                <ul class="list-inline">
                    <li><a href="#">Today</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-comment"></span> 2 Comments</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-share"></span> 8 Shares</a></li>
                </ul>
            </article>
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
                    Xin chào <?php echo $_SESSION['user'];?>
                </h3>
            </div>
            <div class="panel-body">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-log-in"></span>
                    <a href="http://localhost/TTGT/controller/logout.php" onclick="return confirm('Bạn có muốn thoát không?');">Đăng xuất</a>
                </h3>

            </div>
        </div>

        <!-- Progress Bars -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-scale"></span>
                    Thông báo mới
                </h3>
            </div>
            <div class="panel-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        100% Proactively Envisioned
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80"
                         aria-valuemin="0" aria-valuemax="100" style="width:80%">
                        80% Objectively Innovated
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                         aria-valuemin="0" aria-valuemax="100" style="width:45%">
                        45% Portalled
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="35"
                         aria-valuemin="0" aria-valuemax="100" style="width:35%">
                        35% Done
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
