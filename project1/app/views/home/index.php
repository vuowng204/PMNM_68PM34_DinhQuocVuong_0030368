<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

    .dashboard-container {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #fafbfc;
        margin-top: 40px;
        margin-bottom: 80px;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.02);
        width: 100%;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .welcome-banner {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: white;
        padding: 40px;
        border-radius: 16px;
        margin-bottom: 35px;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.15);
        position: relative;
        overflow: hidden;
    }
    .welcome-banner::after {
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%);
        top: -100px;
        right: -50px;
        border-radius: 50%;
    }
    .welcome-banner h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.2;
    }
    .welcome-banner p {
        color: #94a3b8;
        font-size: 16px;
        max-width: 500px;
        line-height: 1.6;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .dashboard-card {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: transparent;
        transition: background-color 0.3s ease;
    }
    .dashboard-card.lop-card::before {
        background: linear-gradient(90deg, #4f46e5, #06b6d4);
    }
    .dashboard-card.sv-card::before {
        background: linear-gradient(90deg, #10b981, #3b82f6);
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .lop-card .card-icon {
        background-color: rgba(79, 70, 229, 0.08);
        color: #4f46e5;
    }
    .sv-card .card-icon {
        background-color: rgba(16, 185, 129, 0.08);
        color: #10b981;
    }

    .card-title {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .card-desc {
        color: #64748b;
        font-size: 14px;
        line-height: 1.5;
    }

    .card-stats {
        margin-top: 30px;
        display: flex;
        align-items: baseline;
        gap: 10px;
    }
    .stats-number {
        font-size: 38px;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }
    .stats-label {
        font-size: 14px;
        color: #64748b;
        font-weight: 500;
    }

    .card-action {
        margin-top: 25px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: gap 0.2s ease;
    }
    .lop-card .card-action { color: #4f46e5; }
    .sv-card .card-action { color: #10b981; }

    .dashboard-card:hover .card-action {
        gap: 10px;
    }
</style>

<div class="dashboard-container">
    <div class="welcome-banner">
        <h1>Hệ Thống Quản Lý Đào Tạo</h1>
        <p>Chào mừng bạn quay trở lại. Hãy sử dụng bảng điều khiển bên dưới hoặc các danh mục trên thanh điều hướng để quản lý dữ liệu.</p>
    </div>

    <div class="dashboard-grid">
        <!-- Lớp học Card -->
        <div class="dashboard-card lop-card">
            <div>
                <div class="card-top">
                    <div class="card-icon">
                        <svg style="width:28px;height:28px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="card-title">Quản Lý Lớp Học</h3>
                <p class="card-desc">Thêm mới, sửa đổi thông tin lớp học và quản lý ghi chú, học phần của từng lớp.</p>
            </div>
            <div>
                <div class="card-stats">
                    <span class="stats-number"><?php echo $totalLop; ?></span>
                    <span class="stats-label">Lớp học hiện tại</span>
                </div>
                <a href="/lop/index" class="card-action">
                    Truy cập quản lý
                    <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Sinh viên Card -->
        <div class="dashboard-card sv-card">
            <div>
                <div class="card-top">
                    <div class="card-icon">
                        <svg style="width:28px;height:28px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="card-title">Quản Lý Sinh Viên</h3>
                <p class="card-desc">Đăng ký thông tin sinh viên mới, cập nhật họ tên, giới tính, lớp học và phân trang tìm kiếm nâng cao.</p>
            </div>
            <div>
                <div class="card-stats">
                    <span class="stats-number"><?php echo $totalSv; ?></span>
                    <span class="stats-label">Sinh viên đăng ký</span>
                </div>
                <a href="/sinhvien/index" class="card-action">
                    Truy cập quản lý
                    <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
