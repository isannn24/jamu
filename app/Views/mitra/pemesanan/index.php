<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3>Pesanan Bahan</h3>

<a href="<?= base_url('mitra/pemesanan/tambah') ?>" class="btn btn-primary mb-3">
    + Pesan Bahan
</a>

<table class="table table-bordered table-striped">
<thead class="table-success">
<tr>
    <th>No</th>
    <th>Bahan</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($pesanan as $p){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p['nama_bahan'] ?></td>
    <td><?= $p['jumlah'] ?></td>
    <td><?= $p['tanggal_pesan'] ?></td>
    <td>
<?php if($p['status'] == 'menunggu'){ ?>
    <span class="badge bg-warning">Menunggu</span>
<?php } elseif($p['status'] == 'diproses'){ ?>
    <span class="badge bg-info">Diproses</span>
<?php } elseif($p['status'] == 'dikirim'){ ?>
    <span class="badge bg-primary">Dikirim</span>
<?php } elseif($p['status'] == 'selesai'){ ?>
    <span class="badge bg-success">Selesai</span>
<?php } elseif($p['status'] == 'ditolak'){ ?>
    <span class="badge bg-danger">Ditolak</span>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<?= $this->endSection() ?>