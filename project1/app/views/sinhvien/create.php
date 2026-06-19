    <style>
        .form-group { margin-bottom: 10px; }
        label { display: inline-block; width: 120px; font-weight: bold; }
        input[type="text"], input[type="email"] { width: 250px; padding: 5px; }
        .error { color: red; margin-bottom: 15px; }
        button { padding: 8px 15px; cursor: pointer; background-color: #2a5d84; color: white; border: none; border-radius: 4px; }
    </style>
    <h2>Đăng ký thông tin sinh viên</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="../sinhvien/store" method="POST">
        <!-- <div class="form-group">
            <label for="mssv">MSSV:</label>
            <input type="text" name="mssv" id="mssv" value="<?php echo $_POST['mssv'] ?? ''; ?>" placeholder="Ví dụ: 012368" required>
        </div> -->
        <div class="form-group">
            <label for="hoten">Họ tên:</label>
            <input type="text" name="hoten" id="hoten" value="<?php echo $_POST['hoten'] ?? ''; ?>" required>
        </div>
        <!-- <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="name@st.huce.edu.vn" required>
        </div> -->
        <div class="form-group">
            <label>Giới tính:</label>
            <input type="radio" name="gioitinh" value="Nam" checked> Nam
            <input type="radio" name="gioitinh" value="Nữ"> Nữ
        </div>
        <!-- <div class="form-group">
            <label for="diachi">Địa chỉ:</label>
            <input type="text" name="diachi" id="diachi" value="<?php echo $_POST['diachi'] ?? ''; ?>" required>
        </div> -->
        <!-- <div class="form-group">
            <label for="ngaysinh">Ngày sinh:</label>
            <input type="text" name="ngaysinh" id="ngaysinh" placeholder="dd/mm/yyyy" value="<?php echo $_POST['ngaysinh'] ?? ''; ?>" required>
        </div> -->
        <div class="form-group">
            <label for="malop">Lớp học *</label>
            <select name="malop" id="malop" style="width: 250px; padding: 5px;" required>
                <option value="">-- Chọn lớp học --</option>
                <?php if (!empty($lophocs)): ?>
                    <?php foreach ($lophocs as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['Malop']); ?>" <?php echo (isset($old['malop']) && $old['malop'] == $lop['Malop']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lop['Malop'] . ' - ' . $lop['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" name="btnDangKy">Đăng ký</button>
    </form>