<?php
    require_once '../app/core/Controller.php';

    class lop extends Controller
    {
        public function index($page = 1){
            // 1. Khởi động session nếu hệ thống chưa bật tự động
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $currentPage = is_numeric($page) ? (int)$page : 1;
            if ($currentPage < 1) $currentPage = 1;

            // 2. Xử lý logic lưu từ khóa tìm kiếm qua Session
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $search = $_POST['search'] ?? '';
                $_SESSION['lop_search_keyword'] = $search; // Lưu vào bộ nhớ tạm riêng cho lớp
            } else {
                $search = $_SESSION['lop_search_keyword'] ?? '';
            }

            $limit = 5; 
            $offset = ($currentPage - 1) * $limit;
            
            $lopModel = $this->model('lopModel');
            $result = $lopModel->paging($limit, $offset, $search);
            $lophocs = $result['lophocs'];
            $totalPage = $result['totalPage'];
            
            $data = [
                'lophocs'   => $lophocs,
                'totalPage' => $totalPage,
                'currentPage' => $currentPage,
                'search'    => $search,
                'viewname'  => 'lop/index', 
                'title'     => 'Danh sách Lớp Học' 
            ];
            
            $this->view('layout/masterlayout', $data);
        }

        public function create(){
            $data = [
                'errors'   => [],
                'viewname' => 'lop/create',
                'title'    => 'Thêm Lớp Học Mới'
            ];
            $this->view('layout/masterlayout', $data);
        }

        public function store(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $errors = [];
                $Malop = trim($_POST['Malop'] ?? '');
                $tenlop = trim($_POST['tenlop'] ?? '');
                $ghichu = trim($_POST['ghichu'] ?? '');

                // Validation
                if (empty($Malop)) {
                    $errors['Malop'] = 'Mã lớp không được để trống.';
                }
                if (empty($tenlop)) {
                    $errors['tenlop'] = 'Tên lớp không được để trống.';
                }

                $lopModel = $this->model('lopModel');
                if (empty($errors)) {
                    // Kiểm tra xem mã lớp đã tồn tại chưa
                    $existing = $lopModel->getByMaLop($Malop);
                    if ($existing) {
                        $errors['Malop'] = 'Mã lớp này đã tồn tại trong hệ thống.';
                    }
                }

                // Nếu có lỗi, quay lại form và hiển thị lỗi kèm dữ liệu đã nhập
                if (!empty($errors)) {
                    $data = [
                        'errors'   => $errors,
                        'viewname' => 'lop/create',
                        'title'    => 'Thêm Lớp Học Mới',
                        'old'      => $_POST
                    ];
                    $this->view('layout/masterlayout', $data);
                    return;
                }
                
                // Lưu vào database
                if ($lopModel->create($Malop, $tenlop, $ghichu)) {
                    header('Location: /lop/index');
                    exit();
                } else {
                    die("Lỗi hệ thống khi lưu dữ liệu.");
                }
            }
        }

        public function edit($Malop) {
            $lopModel = $this->model('lopModel');
            $lophoc = $lopModel->getByMaLop($Malop);
            
            if (!$lophoc) {
                die("Không tìm thấy lớp học này.");
            }

            $data = [
                'lophoc'   => $lophoc,
                'viewname' => 'lop/edit',
                'title'    => 'Chỉnh sửa Lớp Học'
            ];
            $this->view('layout/masterlayout', $data);
        }

        public function update($Malop) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                $tenlop = trim($_POST['tenlop'] ?? '');
                $ghichu = trim($_POST['ghichu'] ?? '');

                if (empty($tenlop)) {
                    $errors['tenlop'] = 'Tên lớp không được để trống.';
                }

                $lopModel = $this->model('lopModel');

                if (!empty($errors)) {
                    $lophoc = [
                        'Malop'  => $Malop,
                        'tenlop' => $tenlop,
                        'ghichu' => $ghichu
                    ];
                    $data = [
                        'errors'   => $errors,
                        'lophoc'   => $lophoc,
                        'viewname' => 'lop/edit',
                        'title'    => 'Chỉnh sửa Lớp Học'
                    ];
                    $this->view('layout/masterlayout', $data);
                    return;
                }

                if ($lopModel->update($Malop, $tenlop, $ghichu)) {
                    header('Location: /lop/index');
                    exit();
                } else {
                    die("Lỗi hệ thống khi cập nhật dữ liệu.");
                }
            }
        }

        public function delete($Malop) {
            $lopModel = $this->model('lopModel');
            if ($lopModel->delete($Malop)) {
                header('Location: /lop/index');
                exit();
            } else {
                die("Lỗi hệ thống khi xóa dữ liệu.");
            }
        }
    }
?>
