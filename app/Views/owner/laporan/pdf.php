<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h3 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background-color: #eee;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>

<h3>LAPORAN OMZET CABANG</h3>

<?php
$periodeText = !empty($periode) 
    ? date('F Y', strtotime($periode)) 
    : 'Semua Periode';
?>

<p>Periode: <?= $periodeText ?></p>

<table>
<tr>
<th>No</th>
<th>Cabang</th>
<th>Total Omzet</th>
</tr>

<?php if(empty($laporan)){ ?>
<tr>
<td colspan="3">Data tidak ditemukan</td>
</tr>
<?php } ?>

<?php $no=1; foreach($laporan as $l){ ?>
<tr>
<td><?= $no++ ?></td>
<td class="text-left"><?= $l['nama_cabang'] ?></td>
<td>Rp <?= number_format($l['total_omset'],0,',','.') ?></td>
</tr>
<?php } ?>

<tr class="total">
<td colspan="2">TOTAL</td>
<td>Rp <?= number_format($total_semua,0,',','.') ?></td>
</tr>

</table>

<br><br>

<p style="text-align:right;">
Dicetak pada: <?= date('d-m-Y') ?>
</p>

</body>
</html>