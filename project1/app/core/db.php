<?php
class ConnectDB {
    // Thêm chữ "static" vào trước các thuộc tính
    protected static $host = 'localhost';
    protected static $username = 'root';
    protected static $password = '';
    protected static $dbname = '68pm34';
    protected $conn; // Biến này không dùng trong hàm static nên có thể giữ nguyên hoặc bỏ

    public static function Connect() {
        $conn = null;
        try {
            // Thay đổi cách gọi biến bằng từ khóa self::$tên_biến
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }
}
?>