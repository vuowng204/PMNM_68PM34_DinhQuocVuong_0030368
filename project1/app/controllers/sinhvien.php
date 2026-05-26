<?php
    require_once '../app/core/Controller.php';

    class sinhvien extends Controller
    {

        public function index(){
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhviens = $sinhvienModel->getAllSinhvien();
            
            // Truyền dữ liệu qua mảng $data để đồng bộ cách làm việc của View
            $data = ['sinhviens' => $sinhviens];
            $this->view('sinhvien/index', $data);
        }
        public function about(){
            echo "<h1>Trang about sinh vien</h1>";
        }
        public function create(){
            $errors = [];
            if (isset($_POST['btnDangKy'])) {
                if (session_status() === PHP_SESSION_NONE) session_start();
                
                $mssv = $_POST['mssv'];
                $email = $_POST['email'];
                $ngaysinh = $_POST['ngaysinh'];
                
                $_SESSION['mssv'] = $mssv;   // Lưu mã số sinh viên vào session
                $_SESSION['email'] = $email;

                // 1. Kiểm tra MSSV: bắt đầu là 0, kết thúc là 68
                if (!preg_match('/^0.*68$/', $mssv)) {
                    $errors[] = "MSSV không hợp lệ (phải bắt đầu bằng số 0 và kết thúc bằng 68).";
                }

                // 2. Kiểm tra Email: có đuôi @st.huce.edu.vn
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@st.huce.edu.vn')) {
                    $errors[] = "Email phải có định dạng @st.huce.edu.vn.";
                }

                // 3. Kiểm tra Ngày sinh: định dạng dd/mm/yyyy
                if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $ngaysinh)) {
                    $errors[] = "Ngày sinh phải có định dạng dd/mm/yyyy.";
                }

                // Nếu không có lỗi, lưu vào session và chuyển hướng
                if (empty($errors)) {
                    if (session_status() === PHP_SESSION_NONE) session_start();
                    $_SESSION['student_data'] = $_POST;
                    
                    // Chuyển hướng sang home/index (tương đương home.php)
                    header("Location: /project/project1/public/home/index");
                    exit();
                }
            }

            // Truyền mảng errors vào view qua biến $data
            $data = ['errors' => $errors];
            require_once  "../app/views/sinhvien/create.php";
            $this->view('sinhvien/create', $data);
        }
    }
?>