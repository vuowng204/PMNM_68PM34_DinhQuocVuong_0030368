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

    public function create($hoten, $gioitinh, $lop){
        $sql = "INSERT INTO sinh_vien (hoten, gioitinh, lop) 
                VALUES (:hoten, :gioitinh, :lop)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':lop', $lop);
        return $stmt->execute();
    }

    public function update($id, $hoten, $gioitinh, $lop) {
        $sql = "UPDATE sinh_vien SET hoten = :hoten, gioitinh = :gioitinh, lop = :lop WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':lop', $lop);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM sinh_vien WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

   public function paging($limit, $offset, $search) {
    // 1. Tạo điều kiện tìm kiếm dạng tương đối %từ_khóa%
    $searchTerm = "%" . $search . "%";

    // 2. Câu lệnh đếm TỔNG SỐ BẢN GHI THEO TỪ KHÓA (Quan trọng nhất)
    $sqlCount = "SELECT COUNT(*) as total FROM sinh_vien WHERE hoten LIKE :search OR ma_lop LIKE :search";
    $stmtCount = $this->conn->prepare($sqlCount);
    $stmtCount->bindValue(':search', $searchTerm, PDO::PARAM_STR);
    $stmtCount->execute();
    $totalRecords = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];

    // Tính lại tổng số trang dựa trên số bản ghi đã được lọc
    $totalPage = ceil($totalRecords / $limit);
    if ($totalPage < 1) $totalPage = 1; // Đảm bảo luôn có ít nhất 1 trang

    // 3. Câu lệnh lấy danh sách dữ liệu có phân trang và tìm kiếm
    $sqlData = "SELECT * FROM sinh_vien 
                WHERE hoten LIKE :search OR ma_lop LIKE :search 
                LIMIT :limit OFFSET :offset";
                
    $stmtData = $this->conn->prepare($sqlData);
    $stmtData->bindValue(':search', $searchTerm, PDO::PARAM_STR);
    $stmtData->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmtData->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmtData->execute();
    $sinhviens = $stmtData->fetchAll(PDO::FETCH_ASSOC);

    // 4. Trả về đúng định dạng dữ liệu mà Controller đang chờ nhận
    return [
        'sinhviens' => $sinhviens,
        'totalPage' => $totalPage
    ];
}
}
?>