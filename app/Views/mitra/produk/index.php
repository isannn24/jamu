<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Menu Produk</h3>

<form method="get" class="mb-3">
    <div class="row g-2">
        <div class="col-md-4">
            <input type="text" name="q" class="form-control" placeholder="Cari nama produk..." value="<?= esc($keyword ?? '') ?>">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary">Cari</button>
            <a href="<?= base_url('mitra/produk') ?>" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Produk</th>
                        <th style="width: 160px;">Harga</th>
                        <th style="width: 120px;">Foto</th>
                        <th>Khasiat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($produk)) : ?>
                        <tr>
                            <td colspan="5" class="text-center">Produk tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>

                    <?php $no = 1; ?>
                    <?php foreach ($produk as $p) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($p['nama_produk']) ?></td>
                            <td>Rp <?= number_format((int) $p['harga'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <?php if (!empty($p['foto'])) : ?>
                                    <img src="<?= base_url('uploads/' . $p['foto']) ?>" alt="<?= esc($p['nama_produk']) ?>" width="70" class="rounded">
                                <?php else : ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($p['khasiat']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
