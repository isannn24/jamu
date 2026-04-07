<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3>Pesan Bahan</h3>

<div class="card">
<div class="card-body">

<form action="<?= base_url('mitra/pemesanan/simpan') ?>" method="post">

<div class="mb-3">
<label>Bahan</label>
<select name="id_bahan" class="form-control">
<?php foreach($bahan as $b){ ?>
<option value="<?= $b['id_bahan'] ?>">
    <?= $b['nama_bahan'] ?> (Stok: <?= $b['stok'] ?> <?= $b['satuan'] ?>)
</option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" required>
</div>

<button class="btn btn-success">Kirim Pesanan</button>

</form>

</div>
</div>

<?= $this->endSection() ?>