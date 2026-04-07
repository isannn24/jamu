<?= $this->extend('owner/layout/template') ?>
<?= $this->section('content') ?>

<h3>Laporan Omset Semua Cabang</h3>

<!-- FILTER -->
<form method="get" class="row mb-3">

    <div class="col-md-3">
        <input type="month" name="periode" class="form-control"
            value="<?= $periode ?? '' ?>">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">Tampilkan</button>
    </div>

    <div class="col-md-2">
        <a href="<?= base_url('owner/laporan/omset') ?>" class="btn btn-secondary">
            Reset
        </a>
    </div>

</form>

<a href="<?= base_url('owner/laporan/pdf') . (!empty($periode) ? '?periode='.$periode : '') ?>" 
class="btn btn-danger mb-3" target="_blank">
Export PDF
</a>

<!-- TABEL -->
<table class="table table-bordered table-striped mt-4">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Periode</th>
<th>Nama Cabang</th>
<th>Total Omzet</th>
</tr>
</thead>

<tbody>

<?php if(empty($laporan)){ ?>
<tr>
<td colspan="4" class="text-center">Data tidak ditemukan</td>
</tr>
<?php } ?>

<?php $no=1; foreach($laporan as $l){ ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $l['periode'] ?></td>
<td><?= $l['nama_cabang'] ?></td>
<td>Rp <?= number_format($l['total_omset'],0,',','.') ?></td>
</tr>
<?php } ?>

</tbody>
</table>

<?= $this->endSection() ?>