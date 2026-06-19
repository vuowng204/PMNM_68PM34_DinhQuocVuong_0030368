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

    public function getById($id) {
        $sql = "SELECT * FROM sinh_vien WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($hoten, $gioitinh, $ma_lop){
        $sql = "INSERT INTO sinh_vien (hoten, gioitinh, ma_lop) 
                VALUES (:hoten, :gioitinh, :ma_lop)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':ma_lop', $ma_lop);
        return $stmt->execute();
    }

    public function update($id, $hoten, $gioitinh, $ma_lop) {
        $sql = "UPDATE sinh_vien SET hoten = :hoten, gioitinh = :gioitinh, ma_lop = :ma_lop WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':ma_lop', $ma_lop);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM sinh_vien WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function paging($limit, $offset, $search, $maLopFilter = '') {
        $searchTerm = "%" . $search . "%";

        // 1. Câu lệnh đếm TỔNG SỐ BẢN GHI
        $sqlCount = "SELECT COUNT(*) as total FROM sinh_vien WHERE (hoten LIKE :search OR ma_lop LIKE :search)";
        if ($maLopFilter !== '') {
            $sqlCount .= " AND ma_lop = :maLopFilter";
        }
        
        $stmtCount = $this->conn->prepare($sqlCount);
        $stmtCount->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        if ($maLopFilter !== '') {
            $stmtCount->bindValue(':maLopFilter', $maLopFilter, PDO::PARAM_STR);
        }
        $stmtCount->execute();
        $totalRecords = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];

        $totalPage = ceil($totalRecords / $limit);
        if ($totalPage < 1) $totalPage = 1;
//      
        // Việc tìm kiếm được thược hiện đồng thời thông qua lệnh này.
        // 2. Câu lệnh lấy danh sách dữ liệu có phân trang và tìm kiếm
        $sqlData = "SELECT * FROM sinh_vien 
                    WHERE (hoten LIKE :search OR ma_lop LIKE :search)";
        if ($maLopFilter !== '') {
            $sqlData .= " AND ma_lop = :maLopFilter";
        }
        $sqlData .= " LIMIT :limit OFFSET :offset";
                    
        $stmtData = $this->conn->prepare($sqlData);
        $stmtData->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        if ($maLopFilter !== '') {
            $stmtData->bindValue(':maLopFilter', $maLopFilter, PDO::PARAM_STR);
        }
        $stmtData->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmtData->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmtData->execute();
        $sinhviens = $stmtData->fetchAll(PDO::FETCH_ASSOC);

        return [
            'sinhviens' => $sinhviens,
            'totalPage' => $totalPage
        ];
    }
}
?>