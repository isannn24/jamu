<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Edit Bahan</h3>

<div class="card">
<div class="card-body">

<form action="<?= base_url('admin/bahan/update/'.$bahan['id_bahan']) ?>" method="post">

<div class="mb-3">
<label>Nama Bahan</label>
<input type="text" name="nama_bahan" value="<?= $bahan['nama_bahan'] ?>" class="form-control">
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" value="<?= $bahan['stok'] ?>" class="form-control">
</div>

<div class="mb-3">
<label>Satuan</label>
<input type="text" name="satuan" value="<?= $bahan['satuan'] ?>" class="form-control">
</div>

<button class="btn btn-success">Update</button>

</form>

</div>
</div>

<?= $this->endSection() ?>