<!DOCTYPE html>
<html>

<head>

<title>Tambah Franchise</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3 class="mb-4">Tambah Franchise</h3>

<div class="card shadow">

<div class="card-body">

<form action="/admin/franchise/simpan" method="post">

<div class="mb-3">
<label class="form-label">Nama Cabang</label>
<input type="text" name="nama_cabang" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Pemilik</label>
<input type="text" name="pemilik" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Kota</label>
<input type="text" name="kota" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">No HP</label>
<input type="text" name="no_hp" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-control">
<option value="Aktif">Aktif</option>
<option value="Nonaktif">Nonaktif</option>
</select>
</div>

<button type="submit" class="btn btn-success">
Simpan
</button>

<a href="/admin/franchise" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>

</html>