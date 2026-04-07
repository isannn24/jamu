<!DOCTYPE html>
<html>
<head>
<title>Mitra - Jamu Aroma</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root { --sidebar-width: 260px; }
body { margin: 0; overflow-x: hidden; background: #e0dfde; }
.sidebar {
    width: var(--sidebar-width);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background: linear-gradient(180deg, #2c3e50, #34495e);
    color: white;
    padding-top: 20px;
    overflow-y: auto;
}
.content { margin-left: var(--sidebar-width); padding: 20px; }
.sidebar a {
    color: #ecf0f1;
    padding: 12px;
    display: block;
    border-radius: 8px;
    margin: 5px 10px;
    transition: 0.3s;
    text-decoration: none;
}
.sidebar a:hover { background-color: #1abc9c; color: white; }
.card { border: none; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
</style>
</head>
<body>
<div class="sidebar">
    <div class="text-center mb-4">
        <img src="/assets/logo.png" width="160" alt="Logo">
        <h5 class="mt-2">Jamu Aroma Rempah</h5>
    </div>

    <hr>

    <a href="<?= base_url('mitra/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="<?= base_url('mitra/penjualan') ?>">
        <i class="bi bi-cash-stack"></i> Penjualan
    </a>
    <a href="<?= base_url('mitra/produk') ?>">
        <i class="bi bi-cup-hot"></i> Menu Produk
    </a>
    <a href="<?= base_url('mitra/rekap-harian') ?>">
        <i class="bi bi-journal-text"></i> Rekap Harian
    </a>
    <a href="<?= base_url('mitra/pemesanan') ?>">
        <i class="bi bi-box"></i> Pesan Bahan
    </a>
    <hr style="border-color: rgba(255,255,255,0.2);">

    <a href="<?= base_url('logout') ?>" style="color:#ffb3b3;">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

<div class="content">
    <?= $this->renderSection('content') ?>
</div>
</body>
</html>