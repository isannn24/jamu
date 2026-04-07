<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-0">Dashboard Admin</h3>
        <p class="text-muted">Ringkasan performa bisnis Jamu Aroma Rempah</p>
    </div>
    <div class="text-end">
        <span class="badge bg-white text-dark shadow-sm p-2 px-3 rounded-pill border">
            <i class="bi bi-calendar3 me-2 text-primary"></i> <?= date('d M Y') ?>
        </span>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#1e6448, #2ecc71);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-shop position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Franchise</h6>
                <h2 class="fw-bold mb-0"><?= $total_franchise ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#787457, #c0ca33);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-cup-hot position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Produk</h6>
                <h2 class="fw-bold mb-0"><?= $total_produk ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#f39c12,#e67e22);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-cart-check position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Transaksi</h6>
                <h2 class="fw-bold mb-0"><?= $total_transaksi ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#1abc9c,#16a085);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-cash-stack position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Omzet</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($total_omzet,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#8e44ad,#9b59b6);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-building position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Pusat (20%)</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($bagi_hasil_pusat,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden" style="background: linear-gradient(45deg,#2e86c1,#5dade2);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-people position-absolute opacity-25" style="font-size: 4rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Mitra (80%)</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($bagi_hasil_mitra,0,',','.') ?></h4>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK -->
<div class="row mt-5">

    <!-- BAR -->
    <div class="col-md-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2 text-primary"></i> Grafik Penjualan Bulanan</h6>
            </div>
            <div class="card-body">
                <div style="height:300px; position:relative;">
                    <canvas id="chartPenjualan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- PIE -->
    <div class="col-md-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold"><i class="bi bi-pie-chart-fill me-2 text-warning"></i> Produk Terlaris</h6>
            </div>
            <div class="card-body">
                <div style="height:300px; max-width:350px; margin:auto; position:relative;">
                    <canvas id="chartProduk"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// BAR CHART
new Chart(document.getElementById('chartPenjualan'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labelTanggal ?? []) ?>,
        datasets: [{
            label: 'Penjualan',
            data: <?= json_encode($dataPenjualan ?? []) ?>,
            backgroundColor: '#1abc9c',
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// PIE CHART (SUDAH FIX)
new Chart(document.getElementById('chartProduk'), {
    type: 'pie',
    data: {
        labels: <?= json_encode($namaProduk ?? []) ?>,
        datasets: [{
            data: <?= json_encode($totalProduk ?? []) ?>,
            backgroundColor: [
                '#1abc9c',
                '#3498db',
                '#9b59b6',
                '#f39c12',
                '#e74c3c'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

<?= $this->endSection() ?>