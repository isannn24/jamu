<!DOCTYPE html>
<html>
<head>
    <title>Owner - Jamu Aroma Rempah</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --primary-color: #1abc9c;
            --secondary-color: #2c3e50;
            --bg-light: #f4f7f6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.1);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.2);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            border-radius: 12px;
            padding: 12px 20px;
            margin: 4px 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 12px;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(26, 188, 156, 0.2);
            color: #1abc9c;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background: #1abc9c;
            color: white;
            box-shadow: 0 4px 15px rgba(26, 188, 156, 0.3);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .topbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-area {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .logo-container {
            padding: 25px;
            text-align: center;
        }

        .logo-container img {
            width: 120px;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="<?= base_url('assets/logo.png') ?>" alt="Logo">
            <h6 class="text-white mt-3 fw-bold tracking-wider">AROMA REMPAH</h6>
            <span class="badge bg-warning text-dark small">Owner / Investor</span>
        </div>

        <hr class="mx-3 opacity-25 bg-white">

        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a href="<?= base_url('owner/dashboard') ?>" class="nav-link <?= (current_url() == base_url('owner/dashboard')) ? 'active' : '' ?>">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('owner/laporan/omset') ?>" class="nav-link <?= (strpos(current_url(), 'omset') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-bar-chart-fill"></i> Laporan Omzet
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('owner/bagi_hasil') ?>" class="nav-link <?= (strpos(current_url(), 'bagi_hasil') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-pie-chart-fill"></i> Rekap Bagi Hasil
                </a>
            </li>
        </ul>

        <div class="mt-auto p-4">
            <a href="<?= base_url('logout') ?>" class="nav-link text-danger border border-danger-offset rounded-3">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content flex-grow-1">
        
        <!-- TOPBAR -->
        <nav class="topbar">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 fw-bold text-secondary">Owner Dashboard</h5>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" data-bs-toggle="dropdown">
                        <div class="me-3 text-end d-none d-md-block">
                            <small class="text-muted d-block">Selamat Datang,</small>
                            <span class="fw-bold"><?= session()->get('username') ?></span>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=<?= session()->get('username') ?>&background=1abc9c&color=fff" class="rounded-circle" width="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item p-3" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- CONTENT AREA -->
        <div class="content-area">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="px-4 py-3 text-center text-muted small">
            &copy; <?= date('Y') ?> Jamu Aroma Rempah. Crafted with <i class="bi bi-heart-fill text-danger mx-1"></i>
        </footer>
    </div>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>