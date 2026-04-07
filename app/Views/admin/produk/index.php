<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<style>

/* ===== CARD ===== */
.card-jamu {
    background: #ffffff;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* ===== TITLE ===== */
h3 {
    color: #000;
    font-weight: 600;
}

/* ===== TABLE ===== */
.table-jamu {
    border-radius: 10px;
    overflow: hidden;
}

/* HEADER */
.table-jamu thead {
    background: #2f5d50;
    color: white;
}

.table-jamu thead th {
    padding: 12px;
    text-align: center;
}

/* BODY */
.table-jamu tbody tr {
    background-color: #ffffff;
}

.table-jamu tbody tr:nth-child(even) {
    background-color: #f7f7f7;
}

.table-jamu tbody tr:hover {
    background-color: #eef7f3;
    transition: 0.2s;
}

/* IMAGE */
.table-jamu img {
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

/* PRICE */
.text-harga {
    color: #3a7d44;
    font-weight: 600;
}

/* BUTTON */
.btn-edit {
    background-color: #c28f2c;
    color: white;
    border: none;
}

.btn-hapus {
    background-color: #a94442;
    color: white;
    border: none;
}

.btn-edit:hover,
.btn-hapus:hover {
    opacity: 0.9;
}

.btn-sm {
    border-radius: 8px;
    padding: 5px 10px;
}

</style>

<div class="container-fluid">

<h3 class="mb-4">Data Produk Jamu</h3>

<a href="/admin/produk/tambah" class="btn btn-success mb-3">
    + Tambah Produk
</a>

<div class="card-jamu">

<table class="table table-bordered align-middle table-jamu">

<thead>
<tr>
<th style="width:60px;">No</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Foto</th>
<th>Khasiat</th>
<th style="width:150px;">Aksi</th>
</tr>
</thead>

<tbody>

<?php $no = 1; ?>
<?php foreach($produk as $p): ?>

<tr>

<td class="text-center fw-bold"><?= $no++ ?></td>

<td><?= $p['nama_produk'] ?></td>

<td class="text-harga">
    Rp <?= number_format($p['harga'],0,',','.') ?>
</td>

<td class="text-center">
<?php if($p['foto']) : ?>
    <img src="/uploads/<?= $p['foto'] ?>" width="80">
<?php else: ?>
    <span class="text-muted">-</span>
<?php endif; ?>
</td>

<td><?= $p['khasiat'] ?></td>

<td class="text-center">

<a href="/admin/produk/edit/<?= $p['id_produk'] ?>" 
class="btn btn-edit btn-sm">
    Edit
</a>

<a href="/admin/produk/hapus/<?= $p['id_produk'] ?>" 
class="btn btn-hapus btn-sm"
onclick="return confirm('Yakin hapus data?')">
    Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

<?= $this->endSection() ?>