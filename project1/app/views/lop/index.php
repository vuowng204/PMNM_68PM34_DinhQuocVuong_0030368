<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

    .lop-container {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: #fafbfc;
        margin-top: 30px;
        margin-bottom: 80px; /* Bổ sung khoảng cách dưới để không bị đè bởi footer fixed */
        padding: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    }
    
    /* Header section */
    .lop-title-section {
        width: 100%;
        max-width: 900px;
        margin-bottom: 25px;
        text-align: left;
    }
    .lop-title-section h1 {
        font-size: 28px;
        color: #1e293b;
        font-weight: 700;
        background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
    }
    .lop-title-section p {
        color: #64748b;
        font-size: 14px;
    }

    .header-actions {
        width: 100%;
        max-width: 900px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 15px;
        flex-wrap: wrap;
    }

    /* Search bar styles */
    .search-form { 
        display: flex; 
        gap: 8px; 
        flex: 1;
        max-width: 450px;
        position: relative;
    }
    .search-input-wrapper {
        position: relative;
        flex: 1;
    }
    .search-input-wrapper svg {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        width: 18px;
        height: 18px;
    }
    .search-form input { 
        width: 100%;
        padding: 12px 16px 12px 40px; 
        border: 1.5px solid #e2e8f0; 
        border-radius: 12px; 
        font-size: 14px;
        color: #334155;
        background-color: #ffffff;
        transition: all 0.3s ease;
        outline: none;
    }
    .search-form input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        background-color: #fff;
    }
    
    /* Modern buttons */
    .btn-custom {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px; 
        font-size: 14px;
        font-weight: 600;
        text-decoration: none; 
        border-radius: 12px;
        border: none;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-search {
        background-color: #4f46e5; 
        color: white; 
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }
    .btn-search:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
    }
    .btn-add { 
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white; 
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }
    .btn-add:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
    }

    /* Table Container with soft card design */
    .table-container {
        width: 100%;
        max-width: 900px;
        background-color: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        border: 1px solid #f1f5f9;
    }

    /* Table styles */
    .lop-table {
        width: 100%;
        border-collapse: collapse; 
        text-align: left;
    }
    .lop-table th {
        background-color: #f8fafc;
        color: #475569;
        padding: 16px 24px;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        border-bottom: 1.5px solid #e2e8f0;
    }
    .lop-table td {
        padding: 16px 24px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 14px;
    }
    .lop-table tr:last-child td {
        border-bottom: none;
    }
    .lop-table tr:hover {
        background-color: #f8fafc;
        transition: background-color 0.2s ease;
    }

    /* Bold Class Code columns */
    .lop-code {
        font-weight: 700;
        color: #4f46e5;
        background-color: rgba(79, 70, 229, 0.05);
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 13px;
        display: inline-block;
    }
    .lop-name {
        font-weight: 600;
        color: #1e293b;
    }

    /* Badges for notes */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    .badge-important {
        background-color: #fee2e2;
        color: #ef4444;
    }
    .badge-warning {
        background-color: #fef3c7;
        color: #d97706;
    }
    .badge-secondary {
        background-color: #f1f5f9;
        color: #64748b;
    }
    .badge-success {
        background-color: #d1fae5;
        color: #10b981;
    }

    /* Action Buttons in Table */
    .actions-cell {
        display: flex;
        gap: 8px;
    }
    .btn-action { 
        text-decoration: none; 
        padding: 8px 12px; 
        border-radius: 8px; 
        font-size: 13px; 
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s ease;
    }
    .btn-edit { 
        background-color: #fffbeb; 
        color: #d97706;
        border: 1px solid #fde68a;
    }
    .btn-edit:hover { 
        background-color: #fef3c7;
        color: #b45309;
        transform: translateY(-1px);
    }
    .btn-delete { 
        background-color: #fef2f2; 
        color: #dc2626;
        border: 1px solid #fecaca;
    }
    .btn-delete:hover { 
        background-color: #fee2e2;
        color: #b91c1c;
        transform: translateY(-1px);
    }

    /* Pagination Styles */
    .pagination {
        margin-top: 25px;
        display: flex;
        gap: 8px;
    }
    .pagination a {
        padding: 10px 16px;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        text-decoration: none;
        color: #475569;
        font-size: 14px;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .pagination a:hover {
        border-color: #cbd5e1;
        background-color: #f8fafc;
        color: #1e293b;
    }
    .pagination a.active {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 10px rgba(79, 70, 229, 0.25);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
    }
    .empty-state svg {
        color: #94a3b8;
        margin-bottom: 15px;
        width: 48px;
        height: 48px;
    }
    .empty-state h3 {
        font-size: 16px;
        color: #475569;
        margin-bottom: 5px;
    }
    .empty-state p {
        font-size: 14px;
        color: #94a3b8;
    }
</style>

<div class="lop-container">
    <div class="lop-title-section">
        <h1>Quản Lý Lớp Học</h1>
        <p>Hiển thị, thêm, sửa đổi hoặc xóa thông tin các lớp học trong hệ thống.</p>
    </div>

    <div class="header-actions">
        <form action="../lop/index/1" method="POST" class="search-form">
            <div class="search-input-wrapper">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" name="search" placeholder="Tìm kiếm theo mã, tên lớp, ghi chú..." value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <button type="submit" class="btn-custom btn-search">Tìm kiếm</button>
        </form>
        <a href="../lop/create" class="btn-custom btn-add">
            <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Thêm lớp học
        </a>
    </div>

    <div class="table-container">
        <table class="lop-table">
            <thead>
                <tr>
                    <th style="width: 20%;">Mã Lớp</th>
                    <th style="width: 45%;">Tên Lớp Học</th>
                    <th style="width: 18%;">Ghi Chú</th>
                    <th style="width: 17%; text-align: center;">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lophocs) && is_array($lophocs)): ?>
                    <?php foreach ($lophocs as $lop): ?>
                        <tr>
                            <td><span class="lop-code"><?php echo htmlspecialchars($lop['Malop']); ?></span></td>
                            <td><span class="lop-name"><?php echo htmlspecialchars($lop['tenlop']); ?></span></td>
                            <td>
                                <?php 
                                    $note = trim($lop['ghichu'] ?? '');
                                    $badgeClass = 'badge-secondary';
                                    if (mb_stripos($note, 'bắt buộc') !== false) {
                                        $badgeClass = 'badge-important';
                                    } elseif (mb_stripos($note, 'quan trọng') !== false) {
                                        $badgeClass = 'badge-warning';
                                    } elseif (mb_stripos($note, 'tự chọn') !== false || mb_stripos($note, 'đạt') !== false) {
                                        $badgeClass = 'badge-success';
                                    }
                                ?>
                                <?php if ($note !== ''): ?>
                                    <span class="badge <?php echo $badgeClass; ?>">
                                        <?php echo htmlspecialchars($note); ?>
                                    </span>
                                <?php else: ?>
                                    <span style="color:#cbd5e1;font-style:italic;">Không có</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="../lop/edit/<?php echo urlencode($lop['Malop']); ?>" class="btn-action btn-edit">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Sửa
                                    </a>
                                    <a href="../lop/delete/<?php echo urlencode($lop['Malop']); ?>" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?')">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3>Không tìm thấy dữ liệu lớp học</h3>
                                <p>Hãy thử tìm kiếm với từ khóa khác hoặc bấm nút thêm mới.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <?php if ($totalPage > 1): ?>
        <div class="pagination">
            <?php for($i = 1; $i <= $totalPage; $i++): ?>
                <a href="../lop/index/<?php echo $i; ?>?search=<?php echo urlencode($search); ?>" class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>
