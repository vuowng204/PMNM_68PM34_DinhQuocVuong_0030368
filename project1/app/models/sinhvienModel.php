<?php

require_once '../app/core/db.php';

class sinhvienModel { 
    // 2. Phải khai báo thuộc tính $conn để class hiểu $this->conn là gì
    protected $conn; 

    public function __construct() {
        // Gọi đến hàm kết nối Database (đảm bảo tên hàm bên class ConnectDB viết đúng, ở đây là ConnectDB)
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien() {
        $sql = "SELECT * FROM sinh_vien";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($hoten, $gioitinh, $lop){
        $sql = "INSERT INTO sinh_vien (hoten, gioitinh, lop) 
                VALUES (:hoten, :gioitinh, :lop)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':lop', $lop);
        return $stmt->execute();
    }
}
?>