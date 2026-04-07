<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<style>
/* ===== CARD WRAPPER ===== */
.card-jamu {
    background: #ffffff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
}

/* ===== TABEL JAMU ===== */
.table-jamu {
    border-radius: 10px;
    overflow: hidden;
}

/* ===== HEADER TABEL ===== */
.table-jamu thead {
    background: linear-gradient(135deg, #2f5d50, #4e7c59);
    color: #fff;
    border-bottom: 3px solid #c28f2c;
}

.table-jamu thead th {
    padding: 12px;
    letter-spacing: 0.5px;
    text-align: center;
}

/* ===== BODY ===== */
.table-jamu tbody tr {
    background-color: #fdf6ee;
}

.table-jamu tbody tr:nth-child(even) {
    background-color: #f3e9dd;
}

.table-jamu tbody tr:hover {
    background-color: #e6f4ea;
    transform: scale(1.002);
    transition: all 0.2s ease;
}

/* ===== BADGE ===== */
.badge {
    padding: 6px 10px;
    font-size: 12px;
    border-radius: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

.badge-menunggu { background-color: #d4a017; color: white; }
.badge-diproses { background-color: #c28f2c; color: white; }
.badge-dikirim { background-color: #3a7d44; color: white; }
.badge-selesai { background-color: #2f5d50; color: white; }
.badge-ditolak { background-color: #a94442; color: white; }

/* ===== BUTTON ===== */
.btn-proses { background-color: #c28f2c; color: white; border: none; }
.btn-kirim { background-color: #3a7d44; color: white; border: none; }
.btn-selesai { background-color: #2f5d50; color: white; border: none; }

.btn-proses:hover,
.btn-kirim:hover,
.btn-selesai:hover {
    opacity: 0.9;
}

.btn-proses,
.btn-kirim,
.btn-selesai,
.btn-danger {
    box-shadow: 0 2px 5px rgba(0,0,0,0.15);
}

.btn-sm {
    border-radius: 8px;
    padding: 5px 10px;
}
</style>

<div class="card-jamu">

<h3 class="mb-4">🌿 Pemesanan Bahan</h3>

<table class="table table-bordered table-jamu">

<thead>
<tr>
<th>No</th>
<th>Cabang</th>
<th>Bahan</th>
<th>Jumlah</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($pesanan as $p){ ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $p['nama_cabang'] ?></td>
<td><?= $p['nama_bahan'] ?></td>
<td><?= $p['jumlah'] ?></td>
<td><?= $p['tanggal_pesan'] ?></td>

<td>
<?php 
$status = $p['status'] ?? 'menunggu';

if($status=='menunggu'){ ?>
    <span class="badge badge-menunggu">Menunggu</span>
<?php } elseif($status=='diproses'){ ?>
    <span class="badge badge-diproses">Diproses</span>
<?php } elseif($status=='dikirim'){ ?>
    <span class="badge badge-dikirim">Dikirim</span>
<?php } elseif($status=='selesai'){ ?>
    <span class="badge badge-selesai">Selesai</span>
<?php } elseif($status=='ditolak'){ ?>
    <span class="badge badge-ditolak">Ditolak</span>
<?php } ?>
</td>

<td>
<?php if($status == 'menunggu'){ ?>

<a href="<?= base_url('admin/pemesanan/proses/'.$p['id_pemesanan']) ?>" 
class="btn btn-proses btn-sm">
Proses
</a>

<a href="<?= base_url('admin/pemesanan/tolak/'.$p['id_pemesanan']) ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Tolak pesanan?')">
Tolak
</a>

<?php } elseif($status == 'diproses'){ ?>

<a href="<?= base_url('admin/pemesanan/kirim/'.$p['id_pemesanan']) ?>" 
class="btn btn-kirim btn-sm"
onclick="return confirm('Kirim bahan?')">
Kirim
</a>

<?php } elseif($status == 'dikirim'){ ?>

<a href="<?= base_url('admin/pemesanan/selesai/'.$p['id_pemesanan']) ?>" 
class="btn btn-selesai btn-sm">
Selesai
</a>

<?php } else { ?>

<span class="text-success fw-bold">✔ Selesai</span>

<?php } ?>
</td>

</tr>

<?php } ?>

</tbody>
</table>

</div>

<?= $this->endSection() ?>