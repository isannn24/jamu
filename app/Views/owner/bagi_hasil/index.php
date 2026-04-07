<?= $this->extend('owner/layout/template') ?>
<?= $this->section('content') ?>

<h3>Laporan Bagi Hasil Semua Cabang</h3>

<!-- FILTER -->
<form method="get" class="row mb-3">

    <div class="col-md-3">
        <input type="month" name="periode" class="form-control"
            value="<?= $periode ?? '' ?>">
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            Tampilkan
        </button>
    </div>

    <div class="col-md-2">
        <a href="<?= base_url('owner/bagi_hasil') ?>" class="btn btn-secondary">
            Reset
        </a>
    </div>

</form>

<!-- TABEL -->
<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Periode</th>
<th>Nama Cabang</th>
<th>Total Omzet</th>
<th>Mitra (80%)</th>
<th>Pusat (20%)</th>
</tr>
</thead>

<tbody>

<?php if(empty($bagi_hasil)){ ?>
<tr>
<td colspan="6" class="text-center">Data tidak ditemukan</td>
</tr>
<?php } ?>

<?php $no=1; foreach($bagi_hasil as $b){ ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $b['periode'] ?></td>
<td><?= $b['nama_cabang'] ?></td>
<td>Rp <?= number_format($b['total_omset'],0,',','.') ?></td>
<td>Rp <?= number_format($b['bagian_mitra'],0,',','.') ?></td>
<td>Rp <?= number_format($b['bagi_hasil_pusat'],0,',','.') ?></td>
</tr>

<?php } ?>

</tbody>
</table>

<?= $this->endSection() ?>