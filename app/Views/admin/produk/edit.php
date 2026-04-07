<!DOCTYPE html>
<html>

<head>

<title>Edit Produk Jamu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Edit Produk Jamu</h3>

<form action="/admin/produk/update/<?= $produk['id_produk'] ?>" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Produk</label>
<input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>">
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>">
</div>

<div class="mb-3">
<label>Khasiat Jamu</label>
<textarea name="khasiat" class="form-control"><?= $produk['khasiat'] ?></textarea>
</div>

<div class="mb-3">
<label>Foto Produk</label><br>

<?php if($produk['foto']) : ?>
<img src="/uploads/<?= $produk['foto'] ?>" width="100" class="mb-2"><br>
<?php endif; ?>

<input type="file" name="foto" class="form-control">
</div>

<button type="submit" class="btn btn-primary">
Update
</button>

<a href="/admin/produk" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>