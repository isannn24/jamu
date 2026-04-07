<?= $this->extend('mitra/layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

<h3 class="mb-4 fw-semibold">Dashboard Mitra</h3>

<!-- CARD -->
<div class="row g-4">

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#27ae60,#2ecc71);">
            <div class="card-body">
                <h6>Total Penjualan</h6>
                <h4>Rp <?= number_format($total_penjualan ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-dark shadow-sm border-0" style="background: linear-gradient(45deg,#f1c40f,#f39c12);">
            <div class="card-body">
                <h6>Pesanan Bahan</h6>
                <h4><?= $total_pesanan ?? 0 ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#2980b9,#3498db);">
            <div class="card-body">
                <h6>Pendapatan Mitra (80%)</h6>
                <h4>Rp <?= number_format($bagian_mitra ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#c0392b,#e74c3c);">
            <div class="card-body">
                <h6>Bagian Pusat (20%)</h6>
                <h4>Rp <?= number_format($bagian_pusat ?? 0,0,',','.') ?></h4>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK SEJAJAR -->
<div class="row mt-4 g-4">

    <!-- BAR CHART -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-3">Omzet Bulanan</h5>

                <div style="height:300px;">
                    <canvas id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-3">Produk Terlaris</h5>

                <div style="height:300px;">
                    <canvas id="chartPie"></canvas>
                </div>
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