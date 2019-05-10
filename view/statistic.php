<?php
require_once "../connect/Database.php";
require_once("../model/Receipt.php");
require "../PHPExcel/Classes/PHPExcel.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/TTGT/index.php');
    die();
}
$rs ;
$flag = 1;
$receipt = new Receipt();
$rs = $receipt->getAllData();

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script>
        $(document).ready(function () {

            $('#boxMonth').change('keyup',function () {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/TTGT/controller/ajax.php?keyword2=" + $(this).val(),
                    success:function (data) {
                        $('#Result').html(data);
                    }
                });

            });
        });
    </script>

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
                    <a href="http://localhost/TTGT/view/admin.php">Tra cứu thông tin vi phạm</a>
                </li>
                <li>
                    <a  href="http://localhost/TTGT/view/hsvv.php">HỒ SƠ VỤ VIỆC</a>
                </li>
            </ul>
            <!-- Search -->
            <form action="#" class="navbar-form navbar-right" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Biển số xe"  id="keyword1"
                    >
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
            <div><h4>Thống kê</h4></div>
        </div>
        <div>
            <form action="#" class="navbar-form navbar-right" role="search" method="get">
                <div class="form-group">
                    <select name="month"class="form-control" id="boxMonth">
                        <option>Chọn Tháng</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Articles -->
        <div >
            <div class="card-header">
                <strong class="card-title">Bảng dữ liệu</strong>
            </div>
            <div class="card-body">
                <div id="bootstrap-data-table_wrapper"
                     class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                    <div class="row" id="Result">

                        <div class="row">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="bootstrap-data-table_previous"><a href="#"
                                                                              aria-controls="bootstrap-data-table"
                                                                              data-dt-idx="0" tabindex="0"
                                                                              class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                                                                    aria-controls="bootstrap-data-table"
                                                                                    data-dt-idx="1" tabindex="0"
                                                                                    class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="bootstrap-data-table_next">
                                        <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0"
                                           class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
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
                    <span class="glyphicon glyphicon-user"></span>
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
