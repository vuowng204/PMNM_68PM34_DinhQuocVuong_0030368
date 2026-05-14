<?php
    class db {
        public static function connect() {
            $server="localhost";
            $user="root";
            $pass="";
            $db="68pm34";
            $conn= new mysqli($server,$user,$pass,$db);
            if($conn->connect_error){
                die("loi ket noi".$conn->connect_error);
            }
            return $conn;
        }
    }
?>