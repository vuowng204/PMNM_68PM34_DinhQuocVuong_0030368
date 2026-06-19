<?php
    require_once '../app/core/Controller.php';
    class home extends Controller
    {
        public function index(){
            if (session_status() === PHP_SESSION_NONE) session_start();

            if (isset($_SESSION['student_data'])) {
                $sv = $_SESSION['student_data'];
                echo "<h1>Đăng ký thành công!</h1>";
                echo "<h3>Thông tin sinh viên:</h3>";
                echo "<ul>";
                echo "<li>Họ tên: " . htmlspecialchars($sv['hoten']) . "</li>";
                echo "<li>Giới tính: " . htmlspecialchars($sv['gioitinh']) . "</li>";
                echo "<li>Lớp: " . htmlspecialchars($sv['lop']) . "</li>";
                echo "</ul>";
                unset($_SESSION['student_data']); // Xóa dữ liệu sau khi hiển thị
            }
            // } else {
            //     echo "<h1>xin chào</h1>";
            // }
    
        $lopModel = $this->model('lopModel');
        $sinhvienModel = $this->model('sinhvienModel');

        $totalLop = count($lopModel->getAllLop());
        $totalSv = count($sinhvienModel->getAllSinhvien());

        $data = [
            'totalLop' => $totalLop,
            'totalSv'  => $totalSv,
            'viewname' => 'home/index', 
            'title'    => 'Trang chủ - QLSV'
        ];
        $this->view('layout/masterlayout', $data);
        }
        public function about(){
            echo "<h1>Trang about</h1>";
            
        }
        public function login(){
            require_once "../app/views/home/login.php";
        }
    }
?>
