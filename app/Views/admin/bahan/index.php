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

/* HEADER CARD */
.card-header-jamu {
    background: #2f5d50;
    color: white;
    border-radius: 10px 10px 0 0;
    padding: 12px 15px;
}

/* TITLE */
.card-header-jamu h4 {
    margin: 0;
    font-weight: 600;
}

/* TABLE */
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

/* BADGE STOK */
.badge-stok {
    background-color: #3a7d44;
    color: white;
    padding: 6px 10px;
    border-radius: 20px;
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

/* SEARCH */
#search {
    border-radius: 8px;
}

</style>

<div class="container-fluid">

<div class="card-jamu">

<!-- HEADER -->
<div class="card-header-jamu d-flex justify-content-between align-items-center">
    <h4>Data Bahan Baku</h4>

    <a href="<?= base_url('admin/bahan/tambah') ?>" class="btn btn-light btn-sm">
        + Tambah
    </a>
</div>

<div class="card-body">

<!-- SEARCH -->
<div class="row mb-3">
    <div class="col-md-4">
        <input type="text" id="search" class="form-control" placeholder="Cari bahan...">
    </div>
</div>

<!-- TABLE -->
<table class="table table-bordered align-middle table-jamu text-center" id="tabelBahan">

<thead>
<tr>
<th style="width:60px;">No</th>
<th>Nama Bahan</th>
<th>Stok</th>
<th>Satuan</th>
<th style="width:150px;">Aksi</th>
</tr>
</thead>

<tbody>

<?php if(empty($bahan)): ?>
<tr>
    <td colspan="5">Data bahan kosong</td>
</tr>
<?php endif; ?>

<?php $no=1; foreach($bahan as $b): ?>

<tr>

<td><?= $no++ ?></td>

<td class="fw-semibold"><?= $b['nama_bahan'] ?></td>

<td>
    <span class="badge badge-stok">
        <?= $b['stok'] ?>
    </span>
</td>

<td><?= $b['satuan'] ?></td>

<td>

<a href="<?= base_url('admin/bahan/edit/'.$b['id_bahan']) ?>" 
class="btn btn-edit btn-sm">
Edit
</a>

<a href="<?= base_url('admin/bahan/hapus/'.$b['id_bahan']) ?>" 
class="btn btn-hapus btn-sm"
onclick="return confirm('Yakin ingin menghapus bahan ini?')">
Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById("search").addEventListener("keyup", function() {

    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tabelBahan tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });

});
</script>

<?= $this->endSection() ?>