<?php
require_once "../connect/Database.php";
require_once "../model/Receipt.php";
require_once "../model/Car.php";
require_once "../model/Trespasser.php";
require_once "../model/User.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/TTGT/index.php');
    die();
}
    if(isset($_POST['addReceipt'])){
        $name = $_POST['hovaten'];
        $address = $_POST['diachi'];
        $bks = $_POST['bienkiemsoat'];
        $soqdxp = $_POST['soquyetdinh'];
        $ngayxuphat = $_POST['ngayqd'];
        $khbienlai = $_POST['kyhieubienlai'];
        $sobienlai = $_POST['sobienlai'];
        $tienphatlx = $_POST['tienphatlaixe'];
        $tienphatcx = $_POST['tienphatchuxe'];
        $tienphatnopcham = $_POST['tienphatnopcham'];
        $ngaynop = $_POST['ngaynop'];
        $ndvipham = $_POST['noidungvipham'];
        $RECEIPT = [];
        $RECEIPT[0] = $khbienlai;
        $RECEIPT[1] = $sobienlai;
        $RECEIPT[2] = $ngayxuphat;
        $RECEIPT[3] = $soqdxp;
        $RECEIPT[4] = $ndvipham;
        $RECEIPT[5] = $tienphatnopcham;
        $RECEIPT[6] = $ngaynop;
        $RECEIPT[7] = $tienphatcx;
        $RECEIPT[8] = $tienphatlx;
        $res = new Receipt();
        $idRes = $res->addReceipt($RECEIPT);
        $car = new Car();
        $idCar = $car->addCar($bks);
        $tres=[];
        $tres[0] = $name;
        $tres[1] = $address;
        $tres[2] = $idRes;
        $tres[3] = $idCar;
        $trespasser = new Trespasser();
        $trespasser->addTrepasser($tres);
        header('Location:http://localhost/TTGT/view/hsvv.php');
    }
?>