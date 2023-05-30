<?php
class DBconnection{
   public $conn;
   function __construct(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="project2";
    $this->conn=new mysqli($servername,$username,$password,$dbname);
    if($this->conn->connect_error){
        die("Connection Failed:".$this->conn->connect_error);
    }
   }
}






?>