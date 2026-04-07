<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Rekap Harian</h3>

<form method="get" class="mb-3">
    <div class="row g-2">
        <div class="col-md-3">
            <input type="date" name="tanggal" class="form-control" value="<?= esc($tanggal) ?>">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary">Tampilkan</button>
        </div>
    </div>
</form>

<div class="row g-3 mb-3">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="text-muted">Jumlah Transaksi</div>
                <h4 class="mb-0"><?= (int)($ringkasan['jumlah_transaksi'] ?? 0) ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="text-muted">Total Omzet</div>
                <h4 class="mb-0 text-success">Rp <?= number_format((int)($ringkasan['total_omzet'] ?? 0), 0, ',', '.') ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 mb-3">
    <div class="card-body">
        <h5 class="mb-3">Ringkasan Produk Terjual</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Produk</th>
                        <th style="width:160px;">Qty Terjual</th>
                        <th style="width:220px;">Nilai Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($produk)) : ?>
                        <tr><td colspan="4" class="text-center">Belum ada penjualan pada tanggal ini.</td></tr>
                    <?php endif; ?>
                    <?php $no = 1; foreach ($produk as $p) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($p['nama_produk']) ?></td>
                            <td><?= (int)$p['total_qty'] ?></td>
                            <td>Rp <?= number_format((int)$p['total_nilai'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="mb-3">Daftar Transaksi</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th style="width:160px;">ID Penjualan</th>
                        <th>Total</th>
                        <th style="width:140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($penjualan)) : ?>
                        <tr><td colspan="4" class="text-center">Belum ada transaksi.</td></tr>
                    <?php endif; ?>
                    <?php $no = 1; foreach ($penjualan as $pj) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>#<?= (int)$pj['id_penjualan'] ?></td>
                            <td>Rp <?= number_format((int)$pj['total'], 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('mitra/penjualan/detail/' . $pj['id_penjualan']) ?>" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
