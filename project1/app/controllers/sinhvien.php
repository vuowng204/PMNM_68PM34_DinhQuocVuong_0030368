<?php
    require_once '../app/core/Controller.php';

    class sinhvien extends Controller
    {

        public function index($page = 1){
        // 1. Khởi động session nếu hệ thống của bạn chưa bật tự động
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $currentPage = is_numeric($page) ? (int)$page : 1;
        if ($currentPage < 1) $currentPage = 1;

        // 2. Xử lý logic lưu từ khóa tìm kiếm thông minh qua Session
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nếu người dùng bấm nút Tìm kiếm
            $search = $_POST['search'] ?? '';
            $_SESSION['search_keyword'] = $search; // Lưu lại vào bộ nhớ tạm
        } else {
            // Nếu người dùng chỉ click chuyển trang (dùng GET), lấy từ khóa cũ ra dùng tiếp
            $search = $_SESSION['search_keyword'] ?? '';
        }

        $limit = 5; 
        $offset = ($currentPage - 1) * $limit;
        
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);
        $sinhviens = $result['sinhviens'];
        $totalPage = $result['totalPage'];
        
        $data = [
            'sinhviens' => $sinhviens,
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
            'search'    => $search, // Đổ lại chữ vào ô input để người dùng thấy họ vừa tìm gì
            'viewname'  => 'sinhvien/index', 
            'title'     => 'Danh sách Sinh viên' 
        ];
        
        
        $this->view('layout/masterlayout', $data);
    }
        public function about(){
            echo "<h1>Trang about sinh vien</h1>";
        }
        public function create(){
            // Chỉ hiển thị form
            $data = [
                'errors'   => [],
                'viewname' => 'sinhvien/create',
                'title'    => 'Đăng ký Sinh viên'
            ];
            $this->view('layout/masterlayout', $data);
        }
        public function store(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $errors = [];
                $hoten = $_POST['hoten'] ?? '';
                $gioitinh = $_POST['gioitinh'] ?? '';
                $lop = $_POST['lop'] ?? '';

                // Nếu có lỗi, quay lại form và hiển thị lỗi
                if (!empty($errors)) {
                    $data = [
                        'errors' => $errors,
                        'viewname' => 'sinhvien/create',
                        'title' => 'Đăng ký Sinh viên'
                    ];
                    $this->view('layout/masterlayout', $data);
                    return;
                }
                
                // Nếu không có lỗi, tiến hành lưu Database
                $sinhvienModel = $this->model('sinhvienModel');
                if ($sinhvienModel->create($hoten, $gioitinh, $lop)) {
                    if (session_status() === PHP_SESSION_NONE) session_start();
                    $_SESSION['student_data'] = $_POST;
                    
                    header('Location: /sinhvien/index');
                    exit();
                } else {
                    die("Lỗi hệ thống khi lưu dữ liệu.");
                }
               
             
           }
        }

        public function edit($id) {
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvien = $sinhvienModel->getById($id);
            
            $data = [
                'sinhvien' => $sinhvien,
                'viewname' => 'sinhvien/edit',
                'title'    => 'Chỉnh sửa Sinh viên'
            ];
            $this->view('layout/masterlayout', $data);
        }

        // public function update($id) {
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $hoten = $_POST['hoten'] ?? '';
        //         $gioitinh = $_POST['gioitinh'] ?? '';
        //         $lop = $_POST['lop'] ?? '';

        //         $sinhvienModel = $this->model('sinhvienModel');
        //         if ($sinhvienModel->update($id, $hoten, $gioitinh, $lop)) {
        //             header('Location: /sinhvien/index');
        //             exit();
        //         } else {
        //             die("Lỗi hệ thống khi cập nhật dữ liệu.");
        //         }
        //     }
        // }

        // public function delete($id) {
        //     $sinhvienModel = $this->model('sinhvienModel');
        //     if ($sinhvienModel->delete($id)) {
        //         header('Location: /sinhvien/index');
        //         exit();
        //     } else {
        //         die("Lỗi hệ thống khi xóa dữ liệu.");
        //     }
        // }
    }
?>