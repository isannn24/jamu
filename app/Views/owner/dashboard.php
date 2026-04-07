<?= $this->extend('owner/layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-0">Dashboard Owner</h3>
        <p class="text-muted">Ringkasan investasi dan performa seluruh cabang</p>
    </div>
    <div class="text-end">
        <span class="badge bg-white text-dark shadow-sm p-2 px-3 rounded-pill border">
            <i class="bi bi-person-workspace me-2 text-warning"></i> Role: Owner / Investor
        </span>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#1e6448, #2ecc71);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-cash-coin position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Total Omzet</h6>
                <h5 class="fw-bold mb-0">Rp <?= number_format($totalOmset,0,',','.') ?></h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#787457, #c0ca33);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-diagram-3 position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Total Cabang</h6>
                <h4 class="fw-bold mb-0"><?= $totalCabang ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#f39c12,#e67e22);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-receipt position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Total Transaksi</h6>
                <h4 class="fw-bold mb-0"><?= $totalTransaksi ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#8e44ad,#9b59b6);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-bank position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Pusat (20%)</h6>
                <h5 class="fw-bold mb-0">Rp <?= number_format($bagiHasilPusat,0,',','.') ?></h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="card h-100 overflow-hidden border-0 shadow-sm text-white" style="background: linear-gradient(45deg,#2e86c1,#5dade2);">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-people-fill position-absolute opacity-25" style="font-size: 3.5rem; right: -10px; bottom: -10px;"></i>
                <h6 class="text-uppercase small fw-bold opacity-75">Bagi Hasil Mitra (80%)</h6>
                <h5 class="fw-bold mb-0">Rp <?= number_format($bagiHasilMitra,0,',','.') ?></h5>
            </div>
        </div>
    </div>

</div>

<!-- GRAFIK -->
<div class="row mt-5">

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-secondary"><i class="bi bi-bar-chart-line-fill me-2 text-primary"></i> Tren Omzet Bulanan</h6>
            </div>
            <div class="card-body">
                <div style="height:300px;">
                    <canvas id="chartOmset"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-secondary"><i class="bi bi-pie-chart-fill me-2 text-success"></i> Distribusi Omzet Per Cabang</h6>
            </div>
            <div class="card-body">
                <div style="height:300px;">
                    <canvas id="chartCabang"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- RANKING -->
<div class="card mt-5 border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-secondary"><i class="bi bi-trophy-fill me-2 text-warning"></i> Ranking Performa Cabang</h5>
        <span class="badge bg-light text-dark border">Top Performers</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3">Rank</th>
                        <th>Nama Cabang</th>
                        <th class="text-end pe-4">Total Omzet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank = 1; ?>
                    <?php foreach ($rankingCabang as $r): ?>
                    <tr>
                        <td class="ps-4 py-3">
                            <?php if ($rank == 1): ?>
                                <span class="badge bg-warning text-dark rounded-pill px-3">🥇 1st</span>
                            <?php elseif ($rank == 2): ?>
                                <span class="badge bg-secondary text-white rounded-pill px-3">🥈 2nd</span>
                            <?php elseif ($rank == 3): ?>
                                <span class="badge bg-bronze text-white rounded-pill px-3" style="background:#cd7f32;">🥉 3rd</span>
                            <?php else: ?>
                                <span class="ms-2 fw-bold text-muted"><?= $rank ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?= $r['nama_cabang'] ?></td>
                        <td class="text-end pe-4 fw-bold text-success">Rp <?= number_format($r['total_penjualan'],0,',','.') ?></td>
                    </tr>
                    <?php $rank++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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