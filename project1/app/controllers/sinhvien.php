<?php
    require_once '../app/core/Controller.php';

    class sinhvien extends Controller
    {

        public function index($page = 1){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $currentPage = is_numeric($page) ? (int)$page : 1;
        if ($currentPage < 1) $currentPage = 1;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'] ?? '';
            $maLopFilter = $_POST['malop_filter'] ?? '';
            $sortField = $_POST['sort_field'] ?? $_SESSION['sinhvien_sort_field'] ?? 'id';
            $sortOrder = $_POST['sort_order'] ?? $_SESSION['sinhvien_sort_order'] ?? 'ASC';
            $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : ($_SESSION['sinhvien_page_size'] ?? 5);

            $_SESSION['search_keyword'] = $search;
            $_SESSION['sinhvien_malop_filter'] = $maLopFilter;
            $_SESSION['sinhvien_sort_field'] = $sortField;
            $_SESSION['sinhvien_sort_order'] = $sortOrder;
            $_SESSION['sinhvien_page_size'] = $limit;
        } else {
            $search = $_GET['search'] ?? $_SESSION['search_keyword'] ?? '';
            $maLopFilter = $_GET['malop_filter'] ?? $_SESSION['sinhvien_malop_filter'] ?? '';
            $sortField = $_GET['sort_field'] ?? $_SESSION['sinhvien_sort_field'] ?? 'id';
            $sortOrder = $_GET['sort_order'] ?? $_SESSION['sinhvien_sort_order'] ?? 'ASC';
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ($_SESSION['sinhvien_page_size'] ?? 5);

            $_SESSION['search_keyword'] = $search;
            $_SESSION['sinhvien_malop_filter'] = $maLopFilter;
            $_SESSION['sinhvien_sort_field'] = $sortField;
            $_SESSION['sinhvien_sort_order'] = $sortOrder;
            $_SESSION['sinhvien_page_size'] = $limit;
        }

        // Validate limit to prevent invalid values
        $allowedLimits = [5, 10, 20, 50];
        if (!in_array($limit, $allowedLimits)) {
            $limit = 5;
        }

        $offset = ($currentPage - 1) * $limit;
        
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search, $maLopFilter, $sortField, $sortOrder);
        $sinhviens = $result['sinhviens'];
        $totalPage = $result['totalPage'];

        $lopModel = $this->model('lopModel');
        $lophocs = $lopModel->getAllLop();
        
        $data = [
            'sinhviens'   => $sinhviens,
            'totalPage'   => $totalPage,
            'currentPage' => $currentPage,
            'search'      => $search,
            'maLopFilter' => $maLopFilter,
            'sortField'   => $sortField,
            'sortOrder'   => $sortOrder,
            'limit'       => $limit,
            'lophocs'     => $lophocs,
            'viewname'    => 'sinhvien/index', 
            'title'       => 'Danh sách Sinh viên' 
        ];
        
        $this->view('layout/masterlayout', $data);
    }
        public function about(){
            echo "<h1>Trang about sinh vien</h1>";
        }
        public function create(){
            $lopModel = $this->model('lopModel');
            $lophocs = $lopModel->getAllLop();
            $data = [
                'errors'   => [],
                'lophocs'  => $lophocs,
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
                $ma_lop = $_POST['malop'] ?? $_POST['ma_lop'] ?? $_POST['lop'] ?? '';

                if (empty($hoten)) {
                    $errors[] = 'Họ tên không được để trống.';
                }
                if (empty($ma_lop)) {
                    $errors[] = 'Lớp học không được để trống.';
                }

                if (!empty($errors)) {
                    $lopModel = $this->model('lopModel');
                    $lophocs = $lopModel->getAllLop();
                    $data = [
                        'errors'   => $errors,
                        'lophocs'  => $lophocs,
                        'viewname' => 'sinhvien/create',
                        'title'    => 'Đăng ký Sinh viên',
                        'old'      => $_POST
                    ];
                    $this->view('layout/masterlayout', $data);
                    return;
                }
                
                $sinhvienModel = $this->model('sinhvienModel');
                if ($sinhvienModel->create($hoten, $gioitinh, $ma_lop)) {
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
            
            $lopModel = $this->model('lopModel');
            $lophocs = $lopModel->getAllLop();

            $data = [
                'sinhvien' => $sinhvien,
                'lophocs'  => $lophocs,
                'viewname' => 'sinhvien/edit',
                'title'    => 'Chỉnh sửa Sinh viên'
            ];
            $this->view('layout/masterlayout', $data);
        }

        public function update($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $hoten = $_POST['hoten'] ?? '';
                $gioitinh = $_POST['gioitinh'] ?? '';
                $ma_lop = $_POST['malop'] ?? $_POST['ma_lop'] ?? $_POST['lop'] ?? '';

                $sinhvienModel = $this->model('sinhvienModel');
                if ($sinhvienModel->update($id, $hoten, $gioitinh, $ma_lop)) {
                    header('Location: /sinhvien/index');
                    exit();
                } else {
                    die("Lỗi hệ thống khi cập nhật dữ liệu.");
                }
            }
        }

        public function delete($id) {
             $sinhvienModel = $this->model('sinhvienModel');
            if ($sinhvienModel->delete($id)) {
                header('Location: /sinhvien/index');
                exit();
            } else {
                die("Lỗi hệ thống khi xóa dữ liệu.");
            }
         }
    }
?>