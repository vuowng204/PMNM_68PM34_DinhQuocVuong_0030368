<?php
    require_once '../app/core/Controller.php';

    class sinhvien extends Controller
    {

        public function index(){
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhviens = $sinhvienModel->getAllSinhvien();
            
            // Truyền dữ liệu qua mảng $data để đồng bộ cách làm việc của View
            $data = [
                'sinhviens' => $sinhviens,
                'viewname'  => 'sinhvien/index', // View con sẽ hiển thị bên trong layout
                'title'     => 'Danh sách Sinh viên' // Tiêu đề trang
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






    }
?>