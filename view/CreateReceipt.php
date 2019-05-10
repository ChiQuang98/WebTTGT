<?php
require_once "../connect/Database.php";
require_once("../model/Receipt.php");
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/TTGT/index.php');
    die();
}

//$idC="";
//$idR="";
//$idP="";
//if(isset($_GET['idc'])&&isset($_GET['idp'])&&$_GET['idr']){
//    $idC = $_GET['idc'];
//    $idP = $_GET['idp'];
//    $idR = $_GET['idr'];
//}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0; background-color: white">
    <a href="http://localhost/TTGT/index.php"><img src="http://localhost/TTGT/images/logo.jpg" alt="logo"
                                                   style="position:relative; left:-650px;top: 3px; width: 100px"></a>
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
                <li>
                    <a href="http://localhost/TTGT/view/hsvv.php">Tra cứu thông tin vi phạm</a>
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
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Tìm kiếm
                </button>
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
            <div class="panel-title"><h3>Thêm mới hồ sơ</h3></div>

        </div>

        <!-- Articles -->
        <div >
            <div class="card-header">

            </div>
            <div class="card-body">

                <form action="http://localhost/TTGT/controller/saveReceipt.php" class="border border-light p-5" method="post">

                    <p class="h4 mb-4 text-center">Hồ sơ</p>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ex1">Họ và Tên</label>
                            <input class="form-control" id="ex1" type="text" name="hovaten" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex2">Địa chỉ</label>
                            <input class="form-control" id="ex2" type="text" name="diachi" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex3">Biển kiểm soát</label>
                            <input class="form-control" id="ex3" type="text" name="bienkiemsoat" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ex4">Số quyết định xử phạt</label>
                            <input class="form-control" id="ex4" type="text" name="soquyetdinh" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex5">Ngày quyết định xử phạt</label>
                            <input id="datepicker" width="276" class="form-control" id="ex5" type="date" name="ngayqd" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex6">Ký hiệu biên lai</label>
                            <input class="form-control" id="ex6" type="text" name="kyhieubienlai" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ex7">Số biên lai</label>
                            <input class="form-control" id="ex7" type="text" name="sobienlai" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex8">Tiền phạt Lái xe</label>
                            <input class="form-control" id="ex8" type="text" name="tienphatlaixe" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex9">Tiền phạt Chủ xe</label>
                            <input class="form-control" id="ex9" type="text" name="tienphatchuxe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ex10">Tiền phạt nộp chậm</label>
                            <input class="form-control" id="ex10" type="text" name="tienphatnopcham" required>
                        </div>
                        <div class="col-xs-4">
                            <label for="ex11">Ngày nộp</label>
                            <input id="datepicker1" width="276" class="form-control" id="ex11" type="date" name="ngaynop" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="textarea">Nội dung vi phạm</label>
                            <textarea id="textarea" class="form-control mb-4"  name="noidungvipham" required></textarea>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <button class="btn btn-info btn-block my-4" type="submit" name="addReceipt">Thêm</button>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-info btn-block my-4" type="reset">Reset</button>
                        </div>

                    </div>
                </form>
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
                    Xin chào <?php echo $_SESSION['user']; ?>
                </h3>
            </div>
            <div class="panel-body">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-log-in"></span>
                    <a href="http://localhost/TTGT/controller/logout.php"
                       onclick="return confirm('Bạn có muốn thoát không?');">Đăng xuất</a>
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
        <div class="container ">
            <span class="glyphicon glyphicon-phone"></span>
            <p > Thanh tra Sở giao thông vận tải Sơn La</p>
            <p > Địa chỉ: số 188 đường Nguyễn Lương Bằng, phường Quyết Thắng, thành phố Sơn La, tỉnh Sơn La</p>
            <p > Điện thoại: 0212 385545454 Fax: 0212 384545455 Emal: Thanhtra.sgtvt@sonla.gov.vn</p>
            <p>Xử lý vi phạm hành chính</p>

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
