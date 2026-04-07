<!DOCTYPE html>
<html>
<head>
    <title>Admin - Jamu Aroma Rempah</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            width: 300px;
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50, #34495e);
        }

        .sidebar .nav-link {
            color: #ddd;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #1abc9c;
            color: white;
        }

        .content {
            width: 100%;
            background: #e0dfde;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar text-white p-3">

        <div class="text-center mb-3">
            <img src="<?= base_url('assets/logo.png') ?>" style="width:160px;">
            <h5 class="mt-1">Jamu Aroma Rempah</h5>
        </div>

        <hr>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/franchise') ?>" class="nav-link">
                    <i class="bi bi-shop"></i> Data Franchise
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/produk') ?>" class="nav-link">
                    <i class="bi bi-capsule"></i> Produk Jamu
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/bahan') ?>" class="nav-link">
                    <i class="bi bi-box-seam"></i> Bahan Baku
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/pemesanan') ?>" class="nav-link">
                    <i class="bi bi-cart"></i> Pemesanan
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('penjualan') ?>" class="nav-link">
                    <i class="bi bi-cash-stack"></i> Penjualan
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('laporan') ?>" class="nav-link">
                    <i class="bi bi-bar-chart"></i> Laporan
                </a>
            </li>

            <li class="nav-item mt-3">
                <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </li>

        </ul>
    </div>

    <!-- CONTENT -->
    <div class="p-4 content">
        <?= $this->renderSection('content') ?>
    </div>

</div>

</body>
</html>