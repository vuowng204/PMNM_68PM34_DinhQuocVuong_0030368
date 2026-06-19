<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

    .form-container {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: #ffffff;
        margin-top: 30px;
        margin-bottom: 80px;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        border: 1px solid #f1f5f9;
        width: 100%;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-header {
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }
    .form-header h2 {
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
    }
    .btn-back {
        text-decoration: none;
        color: #64748b;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: color 0.2s ease;
    }
    .btn-back:hover {
        color: #4f46e5;
    }

    .form-group {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #475569;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        color: #334155;
        background-color: #fafbfc;
        transition: all 0.3s ease;
        outline: none;
    }
    .form-group input:focus, .form-group textarea:focus {
        border-color: #4f46e5;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    .form-group input.is-invalid, .form-group textarea.is-invalid {
        border-color: #f87171;
        background-color: #fef2f2;
    }
    .form-group input.is-invalid:focus, .form-group textarea.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(248, 113, 113, 0.15);
    }
    .error-feedback {
        color: #ef4444;
        font-size: 12px;
        font-weight: 500;
        margin-top: 2px;
    }

    .form-actions {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }
    .btn-submit {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        color: white;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
    }
    .btn-cancel {
        background-color: #f1f5f9;
        color: #475569;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.2s ease;
    }
    .btn-cancel:hover {
        background-color: #e2e8f0;
        color: #1e293b;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h2>Thêm Lớp Học Mới</h2>
        <a href="../lop/index" class="btn-back">
            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Danh sách lớp
        </a>
    </div>

    <form action="../lop/store" method="POST">
        <div class="form-group">
            <label for="Malop">Mã Lớp Học *</label>
            <input type="text" id="Malop" name="Malop" placeholder="Ví dụ: CNTT02, KT03..." 
                   class="<?php echo isset($errors['Malop']) ? 'is-invalid' : ''; ?>"
                   value="<?php echo htmlspecialchars($old['Malop'] ?? ''); ?>" required>
            <?php if (isset($errors['Malop'])): ?>
                <div class="error-feedback"><?php echo $errors['Malop']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="tenlop">Tên Lớp Học *</label>
            <input type="text" id="tenlop" name="tenlop" placeholder="Ví dụ: Lập trình Web, Cơ sở dữ liệu..." 
                   class="<?php echo isset($errors['tenlop']) ? 'is-invalid' : ''; ?>"
                   value="<?php echo htmlspecialchars($old['tenlop'] ?? ''); ?>" required>
            <?php if (isset($errors['tenlop'])): ?>
                <div class="error-feedback"><?php echo $errors['tenlop']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="ghichu">Ghi Chú</label>
            <textarea id="ghichu" name="ghichu" rows="4" placeholder="Ví dụ: Bắt buộc học phần chuyên ngành, Tự chọn, v.v..."
                      class="<?php echo isset($errors['ghichu']) ? 'is-invalid' : ''; ?>"><?php echo htmlspecialchars($old['ghichu'] ?? ''); ?></textarea>
            <?php if (isset($errors['ghichu'])): ?>
                <div class="error-feedback"><?php echo $errors['ghichu']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-actions">
            <a href="../lop/index" class="btn-cancel">Hủy</a>
            <button type="submit" class="btn-submit">Lưu lớp học</button>
        </div>
    </form>
</div>
