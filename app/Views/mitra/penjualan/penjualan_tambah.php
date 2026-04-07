<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3>Input Penjualan</h3>

<form method="post" action="<?= base_url('mitra/penjualan/simpan') ?>">

<div id="produk-list">

<div class="row mb-2">
    <div class="col-md-5">
        <select name="produk[]" class="form-control">
            <option value="">-- pilih produk --</option>
            <?php foreach($produk as $p): ?>
                <option value="<?= $p->id_produk ?>">
                    <?= $p->nama_produk ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-3">
        <input type="number" name="qty[]" class="form-control" placeholder="Qty">
    </div>

</div>

</div>

<button type="button" onclick="tambahProduk()" class="btn btn-success mb-3">
    + Tambah Produk
</button>

<br>

<button type="submit" class="btn btn-primary">
    Simpan Penjualan
</button>

</form>

<script>
function tambahProduk() {
    let html = `
    <div class="row mb-2">
        <div class="col-md-5">
            <select name="produk[]" class="form-control">
                <option value="">-- pilih produk --</option>
                <?php foreach($produk as $p): ?>
                    <option value="<?= $p->id_produk ?>">
                        <?= $p->nama_produk ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" name="qty[]" class="form-control" placeholder="Qty">
        </div>
    </div>
    `;

    document.getElementById('produk-list').insertAdjacentHTML('beforeend', html);
}
</script>

<?= $this->endSection() ?>