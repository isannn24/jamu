<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Data Penjualan</h3>

<a href="<?= base_url('mitra/penjualan/tambah') ?>" class="btn btn-success mb-3">
    + Tambah Penjualan
</a>

<!-- FILTER -->
<form method="get" class="mb-3">
    <div class="row">
        <div class="col-md-3">
            <input type="month" name="bulan" value="<?= $filter_bulan ?? '' ?>" class="form-control">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary">Filter</button>
            <a href="<?= base_url('mitra/penjualan') ?>" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

<div class="card shadow-sm border-0">
<div class="card-body">

<table class="table table-bordered table-hover">
<thead class="table-light">
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($penjualan as $p){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p['tanggal'] ?></td>
    <td>Rp <?= number_format($p['total'],0,',','.') ?></td>
    <td>
        <a href="<?= base_url('mitra/penjualan/detail/'.$p['id_penjualan']) ?>" 
           class="btn btn-sm btn-info">
           Detail
        </a>
    </td>
</tr>
<?php } ?>
</tbody>

</table>

</div>
</div>

<?= $this->endSection() ?>