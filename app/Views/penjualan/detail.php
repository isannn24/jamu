<!DOCTYPE html>
<html>

<head>
    <title>Detail Penjualan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f6fa;">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">
    <h4 class="mb-0">Detail Penjualan</h4>
</div>

<div class="card-body">

<p><b>Tanggal:</b> <?= $header['tanggal'] ?></p>
<p><b>Total:</b> Rp <?= number_format($header['total'],0,',','.') ?></p>

<hr>

<table class="table table-bordered text-center">
<thead class="table-dark">
<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>
</thead>

<tbody>
<?php foreach($detail as $d): ?>
<tr>
    <td><?= $d['nama_produk'] ?></td>
    <td><?= $d['qty'] ?></td>
    <td>Rp <?= number_format($d['harga'],0,',','.') ?></td>
    <td>Rp <?= number_format($d['subtotal'],0,',','.') ?></td>
</tr>
<?php endforeach; ?>
</tbody>

</table>

</div>
</div>

</div>

</body>
</html>