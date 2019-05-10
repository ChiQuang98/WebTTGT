<?php
require_once "../connect/Database.php";
require_once "../model/User.php";
require_once "../model/Receipt.php";
$rs = "";
if(isset($_GET['keyword'])&&$_GET['keyword']!=""){
    $receipt = new Receipt();
    $rs = $receipt->getDataByBKS($_GET['keyword']);
    require_once "../view/table.php";
}
if(isset($_GET['keyword1'])&&$_GET['keyword1']!=""){
    $receipt = new Receipt();
    $rs = $receipt->getDataByBKS($_GET['keyword1']);
    if($_GET['keyword1']==""){
        $rs = $receipt->getAllData();
    }
    require_once "../view/tableAdmin.php";
}
if(isset($_GET['keyword2'])&&$_GET['keyword2']!=""){
    $receipt = new Receipt();
    $rs = $receipt->thongke($_GET['keyword2']);
    if($_GET['keyword2']=="Chọn Tháng"){
        $rs = $receipt->getAllData();
    }
    require_once "../view/tableStatictis.php";
}
?>