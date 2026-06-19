<?php

require_once '../app/core/db.php';

class lopModel { 
    protected $conn; 

    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllLop() {
        $sql = "SELECT * FROM lop";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByMaLop($Malop) {
        $sql = "SELECT * FROM lop WHERE Malop = :Malop";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Malop', $Malop);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($Malop, $tenlop, $ghichu) {
        $sql = "INSERT INTO lop (Malop, tenlop, ghichu) VALUES (:Malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Malop', $Malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    public function update($Malop, $tenlop, $ghichu) {
        $sql = "UPDATE lop SET tenlop = :tenlop, ghichu = :ghichu WHERE Malop = :Malop";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Malop', $Malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    public function delete($Malop) {
        $sql = "DELETE FROM lop WHERE Malop = :Malop";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Malop', $Malop);
        return $stmt->execute();
    }

    public function paging($limit, $offset, $search) {
        $searchTerm = "%" . $search . "%";

        // Count total records
        $sqlCount = "SELECT COUNT(*) as total FROM lop WHERE Malop LIKE :search OR tenlop LIKE :search OR ghichu LIKE :search";
        $stmtCount = $this->conn->prepare($sqlCount);
        $stmtCount->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        $stmtCount->execute();
        $totalRecords = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];

        $totalPage = ceil($totalRecords / $limit);
        if ($totalPage < 1) $totalPage = 1;

        // Fetch data
        $sqlData = "SELECT * FROM lop 
                    WHERE Malop LIKE :search OR tenlop LIKE :search OR ghichu LIKE :search 
                    LIMIT :limit OFFSET :offset";
        $stmtData = $this->conn->prepare($sqlData);
        $stmtData->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        $stmtData->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmtData->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmtData->execute();
        $lophocs = $stmtData->fetchAll(PDO::FETCH_ASSOC);

        return [
            'lophocs' => $lophocs,
            'totalPage' => $totalPage
        ];
    }
}
?>