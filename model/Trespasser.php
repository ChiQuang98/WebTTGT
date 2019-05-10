<?php
class Trespasser extends Database{
    public function addTrepasser($data){
        $query = "INSERT INTO tbltrespasser(name,address,idReceipt,idCar) values('{$data[0]}','{$data[1]}',{$data[2]},{$data[3]})";
        mysqli_query($this->conn,$query);

        return $last_id = mysqli_insert_id($this->conn);
    }
    public function getById($id){
        $query = "SELECT * from tbltrespasser where id={$id}";
        $rs = mysqli_query($this->conn,$query);
        return $row = mysqli_fetch_array($rs);
    }
    public function updateTrepasser($data,$id){
        $query = "UPDATE tbltrespasser set name = '{$data[0]}' ,address='{$data[1]}',idReceipt={$data[2]},idCar={$data[3]} where id={$id}";
        mysqli_query($this->conn,$query);
        return mysqli_query($this->conn,$query);
    }
    public function deleteTrepasser($id){
        $query = "DELETE FROM tbltrespasser where id={$id}";
        mysqli_query($this->conn,$query);
        return mysqli_query($this->conn,$query);
    }
}
?>