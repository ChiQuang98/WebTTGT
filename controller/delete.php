<?php
require_once "../connect/Database.php";
require_once("../model/Receipt.php");
require_once("../model/Trespasser.php");
require_once("../model/Car.php");
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/TTGT/index.php');
    die();
}
$rs ;
$p = new Trespasser();
$receipt = new Receipt();
$c = new Car();
if(isset($_GET['idc'])&&isset($_GET['idp'])&&isset($_GET['idr'])){
   $p->deleteTrepasser($_GET['idp']);
   $receipt->deleteReceipt($_GET['idr']);
   $c->deleteCar($_GET['idc']);
   header('Location:http://localhost/TTGT/view/hsvv.php');
}
?>