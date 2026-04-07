<?= $this->extend('mitra/layout/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-0">Dashboard Mitra</h3>
        <p class="text-muted">Pantau perkembangan outlet franchise Anda</p>
    </div>
    <div class="text-end">
        <span class="badge bg-white text-dark shadow-sm p-2 px-3 rounded-pill border">
            <i class="bi bi-shop me-2 text-success"></i> Outlet: <?= session()->get('username') ?>
        </span>
    </div>
</div>

<!-- CARD -->
<div class="row g-4">

    <div class="col-md-3">
        <div class="card h-100 overflow-hidden border-0 shadow-sm" style="background: linear-gradient(45deg,#27ae60,#2ecc71);">
            <div class="card-body p-4 text-white position-relative">
                <i class="bi bi-graph-up-arrow position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Total Penjualan</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($total_penjualan ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-dark" style="background: linear-gradient(45deg,#f1c40f,#f39c12);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-box-seam position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Pesanan Bahan</h6>
                <h4 class="fw-bold mb-0"><?= $total_pesanan ?? 0 ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#2980b9,#3498db);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-wallet2 position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Bagian Mitra (80%)</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($bagian_mitra ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#c0392b,#e74c3c);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-building-up position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Bagian Pusat (20%)</h6>
                <h4 class="fw-bold mb-0">Rp <?= number_format($bagian_pusat ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK SEJAJAR -->
<div class="row mt-5 g-4">

    <!-- BAR CHART -->
    <div class="col-md-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-secondary"><i class="bi bi-bar-chart-fill me-2 text-primary"></i> Performa Omzet Bulanan</h6>
            </div>
            <div class="card-body">
                <div style="height:320px;">
                    <canvas id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-secondary"><i class="bi bi-pie-chart-fill me-2 text-warning"></i> Menu Favorit</h6>
            </div>
            <div class="card-body">
                <div style="height:320px; max-width:280px; margin:auto;">
                    <canvas id="chartPie"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// BAR CHART
new Chart(document.getElementById('chartBar'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($bulan ?? []) ?>,
        datasets: [{
            label: 'Omzet',
            data: <?= json_encode($total ?? []) ?>,
            backgroundColor: '#3498db',
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// PIE CHART
new Chart(document.getElementById('chartPie'), {
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
                '#e74c3c',
                '#2ecc71'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

<?= $this->endSection() ?>