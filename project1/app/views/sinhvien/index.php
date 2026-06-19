    <style>
        /* Toàn bộ trang */
        .sinhvien-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin-top: 20px;
            padding: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        
        /* Header actions: Search and Add button */
        .header-actions {
            width: 100%;
            max-width: 800px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-form { display: flex; gap: 5px; }
        .search-form input { 
            padding: 8px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            width: 250px;
        }
        .btn-primary { 
            background-color: #2a5d84; 
            color: white; 
            padding: 8px 15px; 
            text-decoration: none; 
            border-radius: 4px;
            border: none;
        }

        /* Container bọc ngoài bảng để tạo bóng đổ và bo góc */
        .table-container {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Cấu trúc Bảng */
        .student-table {
            width: 100%;
            border-collapse: collapse; /* Gộp các đường viền lại thành 1 */
            text-align: left;
        }

        /* Thiết kế Tiêu đề (Header) của bảng */
        .student-table th {
            background-color: #34495e;
            color: #ffffff;
            padding: 14px 20px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        /* Thiết kế các ô dữ liệu (Cells) */
        .student-table td {
            padding: 12px 20px;
            border-bottom: 1px solid #e0e0e0;
            color: #333333;
            font-size: 15px;
        }

        /* Hiệu ứng Đổi màu xen kẽ các dòng (Zebra striping) */
        .student-table tr:nth-child(even) {
            background-color: #f9fbfd;
        }

        /* Hiệu ứng Di chuột qua từng dòng (Hover Effect) */
        .student-table tr:hover {
            background-color: #f1f4f7;
            transition: background-color 0.2s ease;
        }

        /* Định dạng riêng cho cột ID để nổi bật */
        .student-table td:first-child {
            font-weight: bold;
            color: #2c3e50;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .pagination a {
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #34495e;
            border-radius: 4px;
        }
        .pagination a.active {
            background-color: #34495e;
            color: white;
            border-color: #34495e;
        }
        .btn-action { text-decoration: none; padding: 5px 10px; border-radius: 4px; font-size: 13px; color: white; }
        .btn-edit { background-color: #f39c12; }
        .btn-delete { background-color: #e74c3c; }
    </style>
  

    <div class="sinhvien-container">
    <div class="header-actions">
    <form action="../sinhvien/index/1" method="POST" class="search-form">
        <input type="text" name="search" placeholder="Tìm theo tên hoặc lớp..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn-primary">Tìm kiếm</button>
    </form>
        <a href="../sinhvien/create" class="btn-primary" style="background-color: #27ae60;">+ Thêm sinh viên</a>
    </div>

    <div class="table-container">
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Lớp</th>
                    <th>Giới tính</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sinhviens) && is_array($sinhviens)): ?>
                    <?php foreach ($sinhviens as $sinhvien): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sinhvien['id']); ?></td>
                            <td><?php echo htmlspecialchars($sinhvien['hoten']); ?></td>
                            <td><?php echo htmlspecialchars($sinhvien['ma_lop']); ?></td>
                            <td><?php echo htmlspecialchars($sinhvien['gioitinh']); ?></td>
                            <td>
                                <a href="../sinhvien/edit/<?php echo $sinhvien['id']; ?>" class="btn-action btn-edit">Sửa</a>
                                <a href="../sinhvien/delete/<?php echo $sinhvien['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">Không có dữ liệu sinh viên để hiển thị.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php for($i = 1; $i <= $totalPage; $i++): ?>
            <a href="../sinhvien/index/<?php echo $i; ?>?search=<?php echo urlencode($search); ?>" class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
    </div>