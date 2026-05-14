<?php  
    require_once "../models/db.php";
    require_once "../models/sinhvien_ett.php";
    
    class sinhvien_ctrl {
        private $con;
        public function __construct(){
            $this->con=db::connect();
        }

        public function getAll(){
            $sql="select * from sinh_vien";
            $result=$this->con->query($sql);
            $dssinhvien = array();
            
            if($result == false){
                echo "loi lay du lieu hoac danh sach sinh vien";
                return array();
            }

            while($row=$result->fetch_assoc()){
                $dssinhvien[] = new sinhvien_ett($row['id'],$row['hoten'],$row['lop']);
            }
            return $dssinhvien;
        }
    }
?>