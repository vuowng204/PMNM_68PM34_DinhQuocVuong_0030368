<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký sinh viên</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; line-height: 1.6; }
        .form-group { margin-bottom: 10px; }
        label { display: inline-block; width: 120px; font-weight: bold; }
        input[type="text"], input[type="email"] { width: 250px; padding: 5px; }
        .error { color: red; margin-bottom: 15px; }
        button { padding: 8px 15px; cursor: pointer; background-color: #2a5d84; color: white; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Đăng ký thông tin sinh viên</h2>

    <?php if (!empty($data['errors'])): ?>
        <div class="error">
            <ul>
                <?php foreach ($data['errors'] as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="mssv">MSSV:</label>
            <input type="text" name="mssv" id="mssv" value="<?php echo $_POST['mssv'] ?? ''; ?>" placeholder="Ví dụ: 012368" required>
        </div>
        <div class="form-group">
            <label for="hoten">Họ tên:</label>
            <input type="text" name="hoten" id="hoten" value="<?php echo $_POST['hoten'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="name@st.huce.edu.vn" required>
        </div>
        <div class="form-group">
            <label>Giới tính:</label>
            <input type="radio" name="gioitinh" value="Nam" checked> Nam
            <input type="radio" name="gioitinh" value="Nữ"> Nữ
        </div>
        <div class="form-group">
            <label for="diachi">Địa chỉ:</label>
            <input type="text" name="diachi" id="diachi" value="<?php echo $_POST['diachi'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="ngaysinh">Ngày sinh:</label>
            <input type="text" name="ngaysinh" id="ngaysinh" placeholder="dd/mm/yyyy" value="<?php echo $_POST['ngaysinh'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="lop">Lớp:</label>
            <input type="text" name="lop" id="lop" value="<?php echo $_POST['lop'] ?? ''; ?>" required>
        </div>
        <button type="submit" name="btnDangKy">Đăng ký</button>
    </form>
</body>
</html>