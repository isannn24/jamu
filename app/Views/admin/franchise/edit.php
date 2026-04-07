<!DOCTYPE html>
<html>

<head>

<title>Edit Franchise</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Edit Franchise</h3>

<div class="card shadow">

<div class="card-body">

<form action="/admin/franchise/update/<?= $franchise['id_franchise'] ?>" method="post">

<div class="mb-3">
<label>Nama Cabang</label>
<input type="text" name="nama_cabang" class="form-control"
value="<?= $franchise['nama_cabang'] ?>">
</div>

<div class="mb-3">
<label>Pemilik</label>
<input type="text" name="pemilik" class="form-control"
value="<?= $franchise['pemilik'] ?>">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"><?= $franchise['alamat'] ?></textarea>
</div>

<div class="mb-3">
<label>Kota</label>
<input type="text" name="kota" class="form-control"
value="<?= $franchise['kota'] ?>">
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text" name="no_hp" class="form-control"
value="<?= $franchise['no_hp'] ?>">
</div>

<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="Aktif"
<?= $franchise['status'] == 'Aktif' ? 'selected' : '' ?>>
Aktif
</option>

<option value="Nonaktif"
<?= $franchise['status'] == 'Nonaktif' ? 'selected' : '' ?>>
Nonaktif
</option>

</select>

</div>

<button type="submit" class="btn btn-success">
Update
</button>

<a href="/franchise" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>

</html>