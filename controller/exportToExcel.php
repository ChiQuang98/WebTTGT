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
$flag = 0;//false

$receipt = new Receipt();
$rs = $receipt->getAllData();
if(isset($_GET['btnExport'])){
    $excel = new PHPExcel();
    $flag=1;//true
    $excel->setActiveSheetIndex(0);
    $excel->getActiveSheet()->setTitle('demo data');

    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);

    $excel->getActiveSheet()->getRowDimension(1)->setRowHeight(20);



    $excel->getActiveSheet()->getStyle('A1:M1')->getFont()->setBold(true);
    $excel->getActiveSheet()->setCellValue('A1', 'Tên');
    $excel->getActiveSheet()->setCellValue('B1', 'Địa chỉ');
    $excel->getActiveSheet()->setCellValue('C1', 'Biển kiểm soát');
    $excel->getActiveSheet()->setCellValue('D1', 'Nội dung vi phạm');
    $excel->getActiveSheet()->setCellValue('E1', 'Số Quyết Định');
    $excel->getActiveSheet()->setCellValue('F1', 'Ngày Quyết Định');
    $excel->getActiveSheet()->setCellValue('G1', 'Ký hiệu BL');
    $excel->getActiveSheet()->setCellValue('H1', 'Số BL');
    $excel->getActiveSheet()->setCellValue('I1', 'Tổng tiền nộp phạt');
    $excel->getActiveSheet()->setCellValue('J1', 'Lái xe');
    $excel->getActiveSheet()->setCellValue('K1', 'Chủ xe');
    $excel->getActiveSheet()->setCellValue('L1', 'Nộp chậm');
    $excel->getActiveSheet()->setCellValue('M1', 'Ngày nộp');
    $numRow = 2;// dong bat dau
    foreach ($rs as $row) {
        $excel->getActiveSheet()->getRowDimension($numRow)->setRowHeight(40);
        $excel->getActiveSheet()->setCellValue('A' . $numRow, $row['name']);
        $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['address']);
        $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['bks']);
        $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['description']);
        $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['numberDecide']);
        $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['dayReceipt']);
        $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['khReceipt']);
        $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['numberReceipt']);
        $excel->getActiveSheet()->setCellValue('I' . $numRow, (double)$row['boss']+(double)$row['employee']+(double)$row['latePay']);
        $excel->getActiveSheet()->setCellValue('J' . $numRow, $row['employee']);
        $excel->getActiveSheet()->setCellValue('K' . $numRow, $row['boss']);
        $excel->getActiveSheet()->setCellValue('L' . $numRow, $row['latePay']);
        $excel->getActiveSheet()->setCellValue('M' . $numRow, $row['paymentDate']);
        $numRow++;
    }
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data.xls"');
    PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
}