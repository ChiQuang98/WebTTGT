<?php
//Nhúng file PHPExcel
require "../PHPExcel/Classes/PHPExcel.php";
require_once "../connect/Database.php";
require_once("../model/Receipt.php");
require_once "../model/Trespasser.php";
require_once "../model/Car.php";
$file1 = $_FILES['fileExcel'];
move_uploaded_file($file1['tmp_name'],"../upload/".$file1['name']);
//Đường dẫn file
$file = "C:/xampp/htdocs/TTGT/upload/".$file1['name'];
//Tiến hành xác thực file
$objFile = PHPExcel_IOFactory::identify($file);

$objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
$objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
$objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
$sheet = $objPHPExcel->setActiveSheetIndex(0);
//Lấy ra số dòng cuối cùng
$Totalrow = $sheet->getHighestRow();
//Lấy ra tên cột cuối cùng
$LastColumn = $sheet->getHighestColumn();

//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

//Tạo mảng chứa dữ liệu
$data = [];

//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 8
for ($i = 8; $i <= 10; $i++) {
    //----Lặp cột
    for ($j = 1; $j <=13; $j++) {
        // Tiến hành lấy giá trị của từng ô đổ vào mảng
        $data[$i - 8][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
    }
}
$res = new Receipt();
$car = new Car();
$trespasser = new Trespasser();
$tres=[];
foreach($data as $row){
    $name = $row[1];
    $address = $row[2];
    $bks = $row[3];
    $soqdxp = $row[5];
    $ngayxuphat = $row[6];
    $khbienlai = $row[7];
    $sobienlai = $row[8];
    $tienphatlx = $row[10];
    $tienphatcx = $row[11];
    $tienphatnopcham = $row[12];
    $ngaynop = $row[13];
    $ndvipham = $row[4];
    $RECEIPT = [];
     $tempSBL = explode( "'", $sobienlai );
     $sobienlai = trim($tempSBL[0]).trim($tempSBL[1])."-".trim($tempSBL[2]);
     $tempNgayXP = explode( "'", $ngayxuphat );
    $tempNgayXP = explode("/",$tempNgayXP[0]);
    $tempNgayXP = $tempNgayXP[1]."/".$tempNgayXP[0]."/".$tempNgayXP[2];
    $timestamp = strtotime($tempNgayXP);
    $ngayxuphat = date('Y-m-d', $timestamp);
    $soqdxp = explode("'",$soqdxp);
    $soqdxp = trim($soqdxp[1]);
    $ndvipham = explode("'",$ndvipham);
    $ndvipham = (trim($ndvipham[0]));

    $RECEIPT[0] = $khbienlai;
    $RECEIPT[1] = $sobienlai;
    $RECEIPT[2] = $ngayxuphat;
    $RECEIPT[3] = $soqdxp;
    $RECEIPT[4] = $ndvipham;
    $RECEIPT[5] = $tienphatnopcham;
    $RECEIPT[6] = $ngaynop;
    $RECEIPT[7] = $tienphatcx;
    $RECEIPT[8] = $tienphatlx;
    $idRes = $res->addReceipt($RECEIPT);
    $idCar = $car->addCar($bks);
    $address = explode("'",$address);
    $address = trim($address[0]);
    $tres[0] = $name;
    $tres[1] = $address;
    $tres[2] = $idRes;
    $tres[3] = $idCar;
    $trespasser->addTrepasser($tres);

}
header('Location:http://localhost/TTGT/view/hsvv.php');


//////Hiển thị mảng dữ liệu
//echo '<pre>';
//var_dump($data);