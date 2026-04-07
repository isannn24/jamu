<?= $this->extend('owner/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Dashboard Owner</h3>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#1e6448);">
            <div class="card-body">
                <h6>Total Omzet</h6>
                <h3>Rp <?= number_format($totalOmset,0,',','.') ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#787457);">
            <div class="card-body">
                <h6>Total Cabang</h6>
                <h3><?= $totalCabang ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#f39c12,#e67e22);">
            <div class="card-body">
                <h6>Total Transaksi</h6>
                <h3><?= $totalTransaksi ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#8e44ad,#9b59b6);">
            <div class="card-body">
                <h6>Bagi Hasil Pusat (20%)</h6>
                <h3>Rp <?= number_format($bagiHasilPusat,0,',','.') ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white shadow-sm border-0" style="background: linear-gradient(45deg,#2e86c1,#5dade2);">
            <div class="card-body">
                <h6>Bagi Hasil Mitra (80%)</h6>
                <h3>Rp <?= number_format($bagiHasilMitra,0,',','.') ?></h3>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK -->
<div class="row mt-4">

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Omzet Bulanan</h6>
                <div style="height:250px;">
                    <canvas id="chartOmset"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Omzet Per Cabang</h6>
                <div style="height:250px;">
                    <canvas id="chartCabang"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- RANKING -->
<div class="card mt-4 shadow-sm border-0">
    <div class="card-body">
        <h5>🏆 Ranking Cabang</h5>

        <ul class="list-group">
            <?php $rank = 1; ?>
            <?php foreach ($rankingCabang as $r): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <div>
                        <?php if ($rank == 1): ?>
                            🥇
                        <?php elseif ($rank == 2): ?>
                            🥈
                        <?php elseif ($rank == 3): ?>
                            🥉
                        <?php endif; ?>

                        <?= $r->nama_cabang ?>
                    </div>

                    <strong>Rp <?= number_format($r->total,0,',','.') ?></strong>
                </li>
                <?php $rank++; ?>
            <?php endforeach; ?>
        </ul>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// BULANAN
new Chart(document.getElementById('chartOmset'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($bulan) ?>,
        datasets: [{
            label: 'Omzet',
            data: <?= json_encode($total) ?>,
            backgroundColor: '#1abc9c'
        }]
    },
    options: {
        maintainAspectRatio: false
    }
});

// CABANG
new Chart(document.getElementById('chartCabang'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($namaCabang) ?>,
        datasets: [{
            label: 'Omzet Cabang',
            data: <?= json_encode($totalCabangChart) ?>,
            backgroundColor: '#3498db'
        }]
    },
    options: {
        maintainAspectRatio: false
    }
});
</script>

<?= $this->endSection() ?>