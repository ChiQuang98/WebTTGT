<?php
class Car extends Database{
    public function addCar($bks){
        $query = "INSERT INTO tblCar(bks) values('{$bks}')";
        mysqli_query($this->conn,$query);
        return $last_id = mysqli_insert_id($this->conn);
    }
    public function getById($id){
        $query = "SELECT * from tblCar where id={$id}";
        $rs = mysqli_query($this->conn,$query);
        return $row = mysqli_fetch_array($rs);
    }
    public function updateCar($bks,$id){
        $query = "UPDATE tblCar SET bks ='{$bks}' where id={$id}";
        return $last_id =  mysqli_query($this->conn,$query);
    }
    public function deleteCar($id){
        $query = "DELETE FROM tblCar where id={$id}";
        return $last_id =  mysqli_query($this->conn,$query);
    }
}