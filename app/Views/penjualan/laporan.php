<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Laporan Penjualan</h4>

    <a href="/laporan/pdf?cabang=<?= $filterCabang ?>" class="btn btn-danger btn-sm">
        Export PDF
    </a>
</div>

<div class="card-body">

<!-- FILTER CABANG -->
<form method="get" class="row mb-3">

    <div class="col-md-4">
        <select name="cabang" class="form-control">
            <option value="">-- Semua Cabang --</option>

            <?php foreach($listCabang as $c): ?>
                <option value="<?= $c['id_franchise'] ?>"
                    <?= ($filterCabang == $c['id_franchise']) ? 'selected' : '' ?>>
                    <?= $c['nama_cabang'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-2">
        <button class="btn btn-success">Filter</button>
    </div>

    <div class="col-md-2">
        <a href="/laporan" class="btn btn-secondary">Reset</a>
    </div>

</form>

<!-- TABEL -->
<table class="table table-bordered table-striped text-center align-middle">

<thead class="table-dark">
<tr>
<th>No</th>
<th>ID</th>
<th>Cabang</th>
<th>Tanggal</th>
<th>Total</th>
</tr>
</thead>

<tbody>

<?php if(!empty($penjualan)): ?>

<?php 
$no = 1 + (10 * (($currentPage ?? 1) - 1)); 
foreach($penjualan as $p): 
?>

<tr>
<td><?= $no++ ?></td>
<td><?= $p['id_penjualan'] ?></td>
<td><?= $p['nama_cabang'] ?? '-' ?></td>
<td><?= $p['tanggal'] ?></td>
<td>Rp <?= number_format($p['total'],0,',','.') ?></td>
</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td colspan="5">Tidak ada data penjualan</td>
</tr>

<?php endif; ?>

</tbody>

</table>

<!-- PAGINATION MANUAL -->
<div class="d-flex justify-content-center mt-3">

<?php if($currentPage > 1): ?>
    <a href="?cabang=<?= $filterCabang ?>&page_laporan=<?= $currentPage - 1 ?>" class="btn btn-secondary btn-sm me-1">
        Prev
    </a>
<?php endif; ?>

<?php for($i=1; $i <= $totalPage; $i++): ?>
    <a href="?cabang=<?= $filterCabang ?>&page_laporan=<?= $i ?>"
       class="btn btn-sm me-1 <?= ($i == $currentPage) ? 'btn-success' : 'btn-outline-secondary' ?>">
        <?= $i ?>
    </a>
<?php endfor; ?>

<?php if($currentPage < $totalPage): ?>
    <a href="?cabang=<?= $filterCabang ?>&page_laporan=<?= $currentPage + 1 ?>" class="btn btn-secondary btn-sm">
        Next
    </a>
<?php endif; ?>

</div>

</div>

</div>

</div>

<?= $this->endSection() ?>