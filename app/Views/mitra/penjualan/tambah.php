<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Input Penjualan</h3>

<div class="card shadow-sm">
<div class="card-body">

<form action="<?= base_url('mitra/penjualan/simpan') ?>" method="post">

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
</div>

<table class="table" id="tableProduk">
<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Aksi</th>
</tr>

<tr>
    <td>
        <select name="produk[]" class="form-control">
            <option value="">-- pilih produk --</option>
            <?php foreach($produk as $p){ ?>
            <option value="<?= $p['id_produk'] ?>" data-harga="<?= $p['harga'] ?>">
                <?= $p['nama_produk'] ?>
            </option>
            <?php } ?>
        </select>
    </td>

    <td>
        <input type="number" name="qty[]" class="form-control" min="1">
    </td>

    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">X</button>
    </td>
</tr>

</table>

<button type="button" class="btn btn-primary mb-3" onclick="tambahBaris()">
+ Tambah Produk
</button>

<br>

<button class="btn btn-success">Simpan</button>

</form>

</div>
</div>

<script>
function tambahBaris(){
    let table = document.getElementById("tableProduk");
    let row = table.rows[1].cloneNode(true);

    row.querySelectorAll("input").forEach(input => input.value = "");
    row.querySelector("select").selectedIndex = 0;

    table.appendChild(row);
}

function hapusBaris(btn){
    let row = btn.parentNode.parentNode;
    let table = document.getElementById("tableProduk");

    if(table.rows.length > 2){
        row.remove();
    }
}
</script>

<?= $this->endSection() ?>