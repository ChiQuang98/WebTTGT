<?php
/**
 * Created by PhpStorm.
 * User: chiquang
 * Date: 5/3/2019
 * Time: 2:06 PM
 */
class Database{
    const DB="ttgt";
    const user="root";
    const password = "";
    const host="localhost";
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(self::host,self::user,self::password,self::DB);

        if(!$this->conn){
            die("Can not connect to DB");
        }
    }
    public function disconnect(){
        $this->conn=mysqli_close();
}
}