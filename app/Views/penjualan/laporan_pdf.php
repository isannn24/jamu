<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    </style>
</head>

<body>

<h3>Laporan Penjualan</h3>

<table>
<tr>
    <th>No</th>
    <th>ID</th>
    <th>Cabang</th>
    <th>Tanggal</th>
    <th>Total</th>
</tr>

<?php $no=1; foreach($penjualan as $p): ?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $p['id_penjualan'] ?></td>
    <td><?= $p['nama_cabang'] ?? '-' ?></td>
    <td><?= $p['tanggal'] ?></td>
    <td><?= number_format($p['total'],0,',','.') ?></td>
</tr>

<?php endforeach; ?>

</table>

</body>
</html>