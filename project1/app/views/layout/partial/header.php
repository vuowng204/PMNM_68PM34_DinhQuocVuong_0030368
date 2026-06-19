<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    .header {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: #ffffff;
        padding: 18px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        position: relative;
        z-index: 100;
    }    
    .logo-container a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 700;
        font-size: 24px;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: transform 0.2s ease;
    }
    .logo-container a:hover {
        transform: scale(1.02);
    }
    .nav-container {
        display: flex;
        gap: 20px;
        align-items: center;
    }
    .nav-link {
        color: #94a3b8;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        padding: 8px 16px;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .nav-link:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.05);
    }
    .nav-link.active {
        color: #ffffff;
        background-color: rgba(59, 130, 246, 0.15);
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    .user-info {
        color: #94a3b8;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>
<div class="header">
    <div class="logo-container">
        <a href="/home/index">
            <svg style="width:24px;height:24px;stroke:#3b82f6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
            </svg>
            QLSV
        </a>
    </div>
    <div class="nav-container">
        <?php 
            $uri = $_SERVER['REQUEST_URI'] ?? '';
            $isLopActive = (strpos($uri, '/lop') !== false);
            $isSvActive = (strpos($uri, '/sinhvien') !== false);
        ?>
        <a href="/lop/index" class="nav-link <?php echo $isLopActive ? 'active' : ''; ?>">
            <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            QL Lớp Học
        </a>
        <a href="/sinhvien/index" class="nav-link <?php echo $isSvActive ? 'active' : ''; ?>">
            <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            QL Sinh viên
        </a>
        
        <?php if (isset($_SESSION['username'])): ?>
            <div class="user-info" style="margin-left: 20px; border-left: 1px solid #334155; padding-left: 20px;">
                <svg style="width:16px;height:16px" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                <span>Hi, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
            </div>
        <?php endif; ?>
    </div>
</div>