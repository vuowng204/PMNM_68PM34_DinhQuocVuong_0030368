<style>
    .form-group { margin-bottom: 10px; }
    label { display: inline-block; width: 120px; font-weight: bold; }
    input[type="text"] { width: 250px; padding: 5px; }
    button { padding: 8px 15px; cursor: pointer; background-color: #f39c12; color: white; border: none; border-radius: 4px; }
</style>

<h2>Chỉnh sửa thông tin sinh viên</h2>

<form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">
    <div class="form-group">
        <label for="hoten">Họ tên:</label>
        <input type="text" name="hoten" id="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required>
    </div>
    
    <div class="form-group">
        <label>Giới tính:</label>
        <input type="radio" name="gioitinh" value="Nam" <?php echo ($sinhvien['gioitinh'] == 'Nam') ? 'checked' : ''; ?>> Nam
        <input type="radio" name="gioitinh" value="Nữ" <?php echo ($sinhvien['gioitinh'] == 'Nữ') ? 'checked' : ''; ?>> Nữ
    </div>

    <div class="form-group">
        <label for="lop">Lớp:</label>
        <input type="text" name="lop" id="lop" value="<?php echo htmlspecialchars($sinhvien['lop']); ?>" required>
    </div>

    <div class="form-group">
        <button type="submit">Cập nhật</button>
        <a href="/sinhvien/index">Hủy</a>
    </div>
</form>