<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

<div class="card shadow border-0">

<div class="card-header bg-success text-white py-2">
    <h5 class="mb-0">Data Penjualan</h5>
</div>

<div class="card-body p-3">

<!-- FILTER -->
<form method="get" class="row g-2 mb-3">

<div class="col-md-3">
    <input type="text" name="keyword" class="form-control form-control-sm"
        placeholder="Cari cabang"
        value="<?= $_GET['keyword'] ?? '' ?>">
</div>

<div class="col-md-3">
    <select name="cabang" class="form-control form-control-sm">
        <option value="">-- Semua Cabang --</option>
        <?php foreach($listCabang as $c): ?>
            <option value="<?= $c['id_franchise'] ?>"
            <?= (($_GET['cabang'] ?? '') == $c['id_franchise']) ? 'selected' : '' ?>>
                <?= $c['nama_cabang'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="col-md-3">
    <input type="date" name="tanggal" class="form-control form-control-sm"
        value="<?= $_GET['tanggal'] ?? '' ?>">
</div>

<div class="col-md-3 d-flex gap-1">
    <button class="btn btn-success btn-sm w-100">Filter</button>
    <a href="/penjualan" class="btn btn-secondary btn-sm w-100">Reset</a>
</div>

</form>

<!-- TABLE (ANTI SCROLL) -->
<div class="table-responsive">

<table class="table table-sm table-striped table-bordered text-center align-middle mb-0">

<thead class="table-dark">
<tr>
<th>No</th>
<th>Cabang</th>
<th>Tanggal</th>
<th>Total</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php if(empty($penjualan)): ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>

<?php 
$no = 1 + (10 * (($currentPage ?? 1) - 1)); 
foreach($penjualan as $p): 
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $p['nama_cabang'] ?? '-' ?></td>

<td><?= $p['tanggal'] ?></td>

<td>
Rp <?= number_format($p['total'],0,',','.') ?>
</td>

<td>
<a href="/penjualan/detail/<?= $p['id_penjualan'] ?>" class="btn btn-info btn-sm">
Detail
</a>
</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<!-- PAGINATION SIMPLE (NO SCROLL) -->
<div class="d-flex justify-content-between align-items-center mt-3">

<?php if($currentPage > 1): ?>
<a href="?page=<?= $currentPage - 1 ?>" class="btn btn-outline-secondary btn-sm">
← Prev
</a>
<?php else: ?>
<div></div>
<?php endif; ?>

<span class="fw-semibold">
Halaman <?= $currentPage ?> / <?= $totalPage ?>
</span>

<?php if($currentPage < $totalPage): ?>
<a href="?page=<?= $currentPage + 1 ?>" class="btn btn-success btn-sm">
Next →
</a>
<?php endif; ?>

</div>

</div>

</div>

</div>

<?= $this->endSection() ?>