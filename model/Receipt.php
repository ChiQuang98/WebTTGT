<?php
class Receipt extends Database{
    public function getDataByBKS($bks){
        $query = "SELECT p.id,r.id,c.id,p.name,p.address,c.bks,p.type,r.paymentDate,r.latePay,r.numberReceipt,r.description,r.boss,r.employee  from 
                  tblcar c,tblreceipt r,tbltrespasser p
                  WHERE p.idCar = c.id and p.idReceipt = r.id and c.bks LIKE '%".$bks."%'";
        $rs = mysqli_query($this->conn,$query);
        $list = [];

        while($row = mysqli_fetch_array($rs)){
            $list [] = $row;
        }

        return $list;
    }
    public function getAllData(){
//        $query = "SELECT p.id,p.idCar,p.idReceipt, p.name,p.address,c.bks,p.type,r.paymentDate,r.latePay,r.numberReceipt,r.description,r.boss,r.employee  from
//                  tblcar c,tblreceipt r,tbltrespasser p
//                  WHERE p.idCar = c.id and p.idReceipt = r.id";
        $query = "SELECT *  from 
                  tblcar c,tblreceipt r,tbltrespasser p
                  WHERE p.idCar = c.id and p.idReceipt = r.id";
        $rs = mysqli_query($this->conn,$query);
        $list = [];

        while($row = mysqli_fetch_array($rs)){
            $list [] = $row;
        }
        return $list;
    }
    public function addReceipt($data){
        $query = "INSERT INTO tblreceipt(khReceipt,numberReceipt,dayReceipt,numberDecide,description,latePay,paymentDate,boss,employee)
      values('{$data[0]}','{$data[1]}','$data[2]','$data[3]','$data[4]',$data[5],'$data[6]',$data[7],$data[8])";

        mysqli_query($this->conn,$query);
        return $last_id = mysqli_insert_id($this->conn);
    }
    public function updateReceipt($data,$id){
        $query = "UPDATE tblreceipt set khReceipt ='{$data[0]}' ,numberReceipt='{$data[1]}',dayReceipt='$data[2]',numberDecide='$data[3]',description='$data[4]',latePay=$data[5],
paymentDate='$data[6]',boss=$data[7],employee=$data[8] where id ={$id}";
        return mysqli_query($this->conn,$query);
    }
    public function getById($id){
        $query = "SELECT * from tblreceipt where id={$id}";
        $rs = mysqli_query($this->conn,$query);
        return $row = mysqli_fetch_array($rs);
    }
    public function deleteReceipt($id){
        $query = "DELETE FROM tblreceipt where id ={$id}";
        return mysqli_query($this->conn,$query);
    }
    public function thongke($month){
        $query = "SELECT DISTINCT *,DATE_FORMAT(r.dayReceipt,'%m') as MonthY 
FROM tblcar c,tblreceipt r,tbltrespasser p WHERE p.idCar = c.id and 
p.idReceipt = r.id and (MONTH(r.dayReceipt)='{$month}') GROUP by r.dayReceipt";
        $rs = mysqli_query($this->conn,$query);
        $list = [];

        while($row = mysqli_fetch_array($rs)){
            $list [] = $row;
        }
        return $list;
    }
    public function bieudo($month){
        $query = "SELECT DISTINCT COUNT(r.numberDecide) as SoNguoiVP,sum(r.boss+r.employee+r.latePay) 
as soTienVP,DATE_FORMAT(r.dayReceipt,'%Y-%m') as MonthY FROM tblcar c,tblreceipt r,tbltrespasser p 
WHERE p.idCar = c.id and p.idReceipt = r.id and (MONTH(r.dayReceipt)='{$month}') GROUP by MONTH(r.dayReceipt)";
        $rs = mysqli_query($this->conn,$query);
        $data = array();
        while($row = mysqli_fetch_assoc($rs)){
            $data = $row;
        }
        return $data;
    }
    function convertDataToChartForm($data)
    {
        $newData = array();
        $firstLine = true;

        foreach ($data as $dataRow)
        {
            if ($firstLine)
            {
                $newData[] = array_keys($dataRow);
                $firstLine = false;
            }

            $newData[] = array_values($dataRow);
        }

        return $newData;
    }
}
