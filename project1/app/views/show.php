<?php
require_once "../controller/sinhvien_ctrl.php";

$ctrl = new sinhvien_ctrl();
$dssinhvien = $ctrl->getAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>Lớp</th>
        </tr>
        <?php foreach ($dssinhvien as $sv): ?>
        <tr>
            <td><?php echo $sv->id; ?></td>
            <td><?php echo $sv->hoten; ?></td>
            <td><?php echo $sv->lop; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
