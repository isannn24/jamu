<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Tambah Bahan Baku</h3>

<div class="card">
<div class="card-body">

<form action="<?= base_url('admin/bahan/simpan') ?>" method="post">

<div class="mb-3">
<label class="form-label">Nama Bahan</label>
<input type="text" name="nama_bahan" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Stok</label>
<input type="number" name="stok" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Satuan</label>
<input type="text" name="satuan" class="form-control">
</div>

<button type="submit" class="btn btn-success">
<i class="bi bi-save"></i> Simpan
</button>

<a href="<?= base_url('admin/bahan') ?>" class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

<?= $this->endSection() ?>