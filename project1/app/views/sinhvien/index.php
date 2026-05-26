<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>
    <style>
        /* Toàn bộ trang */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
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
    </style>
</head>
<body>

    <div class="table-container">
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Lớp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhviens as $sinhvien): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sinhvien['id']); ?></td>
                        <td><?php echo htmlspecialchars($sinhvien['hoten']); ?></td>
                        <td><?php echo htmlspecialchars($sinhvien['lop']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>