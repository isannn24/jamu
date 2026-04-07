<!DOCTYPE html>
<html>

<head>

<title>Tambah Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Tambah Produk Jamu</h3>

<form action="/admin/produk/simpan" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Produk</label>
<input type="text" name="nama_produk" class="form-control">
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control">
</div>

<div class="mb-3">
<label>Khasiat Jamu</label>
<textarea name="khasiat" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Foto Produk</label>
<input type="file" name="foto" class="form-control">
</div>

<button class="btn btn-success">
Simpan
</button>

<a href="/admin/produk" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>