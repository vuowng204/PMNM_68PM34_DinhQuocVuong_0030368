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
}
?>