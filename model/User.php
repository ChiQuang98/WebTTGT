<?php

class User extends Database{
    public function getUserByKey($user,$pass){
        $query = "select * from tblUser where username='".$user."' and password='".$pass."'";
        $rs = mysqli_query($this->conn,$query);
        $list = [];
        while($row = mysqli_fetch_array($rs)){

            $list [] = $row;
        }
        return $list;
    }
}
