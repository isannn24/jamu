<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row g-3">

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#1e6448);">
            <div class="card-body">
                <h6>Total Franchise</h6>
                <h3><?= $total_franchise ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#787457);">
            <div class="card-body">
                <h6>Total Produk</h6>
                <h3><?= $total_produk ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#f39c12,#e67e22);">
            <div class="card-body">
                <h6>Total Transaksi</h6>
                <h3><?= $total_transaksi ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#1abc9c,#16a085);">
            <div class="card-body">
                <h6>Total Omzet</h6>
                <h3>Rp <?= number_format($total_omzet,0,',','.') ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#8e44ad,#9b59b6);">
            <div class="card-body">
                <h6>Bagi Hasil Pusat (20%)</h6>
                <h3>Rp <?= number_format($bagi_hasil_pusat,0,',','.') ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#2e86c1,#5dade2);">
            <div class="card-body">
                <h6>Bagi Hasil Mitra (80%)</h6>
                <h3>Rp <?= number_format($bagi_hasil_mitra,0,',','.') ?></h3>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK -->
<div class="row mt-4">

    <!-- BAR -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Grafik Penjualan</h6>

                <div style="height:250px; position:relative;">
                    <canvas id="chartPenjualan"></canvas>
                </div>

            </div>
        </div>
    </div>

    <!-- PIE -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Produk Terlaris</h6>

                <!-- FIX SIZE -->
                <div style="height:250px; max-width:300px; margin:auto; position:relative;">
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