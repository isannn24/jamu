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

/* ===== BADGE ===== */
.badge-aktif {
    background-color: #3a7d44;
    color: white;
}

.badge-nonaktif {
    background-color: #6c757d;
    color: white;
}

/* ===== BUTTON ===== */
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

<h3 class="mb-4">Data Franchise</h3>

<a href="/admin/franchise/tambah" class="btn btn-success mb-3">
Tambah Franchise
</a>

<div class="card-jamu">

<table class="table table-bordered table-jamu">

<thead>
<tr>
<th>No</th>
<th>Nama Cabang</th>
<th>Pemilik</th>
<th>Alamat</th>
<th>Kota</th>
<th>No HP</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no = 1; ?>
<?php foreach($franchise as $f): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $f['nama_cabang'] ?></td>
<td><?= $f['pemilik'] ?></td>
<td><?= $f['alamat'] ?? '-' ?></td>
<td><?= $f['kota'] ?? '-' ?></td>
<td><?= $f['no_hp'] ?? '-' ?></td>

<td>
<?php if(($f['status'] ?? '') == 'Aktif'): ?>
    <span class="badge badge-aktif">Aktif</span>
<?php else: ?>
    <span class="badge badge-nonaktif">Nonaktif</span>
<?php endif; ?>
</td>

<td>

<a href="/admin/franchise/edit/<?= $f['id_franchise'] ?>" 
class="btn btn-edit btn-sm">
Edit
</a>

<a href="/admin/franchise/hapus/<?= $f['id_franchise'] ?>" 
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