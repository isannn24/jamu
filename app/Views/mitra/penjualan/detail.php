<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4 fw-semibold">Detail Transaksi</h3>

<!-- HEADER -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-1"><b>Tanggal:</b></p>
                <h6><?= $header['tanggal'] ?></h6>
            </div>

            <div class="col-md-6 text-end">
                <p class="mb-1"><b>Total Transaksi:</b></p>
                <h5 class="text-success">
                    Rp <?= number_format($header['total'],0,',','.') ?>
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- DETAIL PRODUK -->
<div class="card shadow-sm border-0">
    <div class="card-body">

        <h5 class="mb-3">Daftar Produk</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">

                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                <?php $no = 1; foreach($detail as $d){ ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="text-start"><?= $d['nama_produk'] ?></td>
                        <td><?= $d['qty'] ?></td>
                        <td>Rp <?= number_format($d['harga'],0,',','.') ?></td>
                        <td class="fw-semibold text-success">
                            Rp <?= number_format($d['subtotal'],0,',','.') ?>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

<!-- BUTTON -->
<a href="<?= base_url('mitra/penjualan') ?>" class="btn btn-secondary mt-3">
    ← Kembali
</a>

<?= $this->endSection() ?>