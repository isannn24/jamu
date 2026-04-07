<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
    <div>
        <h3 class="fw-bold mb-0">Rekap Bagi Hasil Bulanan</h3>
        <p class="text-muted">Kelola bagi hasil setiap cabang secara berkala</p>
    </div>
</div>

<!-- FILTER -->
<div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInUp">
    <div class="card-body">
        <form method="get" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label fw-medium small text-muted text-uppercase">Periode Bulan</label>
                <input type="month" name="periode" class="form-control" value="<?= $periode ?? '' ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-medium small text-muted text-uppercase">Filter Cabang</label>
                <select name="id_franchise" class="form-select">
                    <option value="">Semua Cabang</option>
                    <?php foreach($franchise_list as $f): ?>
                        <option value="<?= $f['id_franchise'] ?>" <?= ($id_franchise == $f['id_franchise']) ? 'selected' : '' ?>>
                            <?= $f['nama_cabang'] ?> (<?= $f['pemilik'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-search me-2"></i> Tampilkan
                </button>
            </div>
            <div class="col-md-auto">
                <a href="<?= base_url('admin/bagi_hasil') ?>" class="btn btn-light px-4 border">
                    <i class="bi bi-arrow-clockwise me-2"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<!-- TABEL -->
<div class="card border-0 shadow-sm animate__animated animate__fadeInUp animate__delay-1s">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">No</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Periode</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Cabang</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Total Omzet</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Mitra (80%)</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Pusat (20%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($bagi_hasil)){ ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-25"></i>
                                Belum ada data rekap bagi hasil untuk kriteria ini
                            </td>
                        </tr>
                    <?php } ?>

                    <?php $no=1; foreach($bagi_hasil as $b){ ?>
                        <tr>
                            <td class="ps-4"><?= $no++ ?></td>
                            <td>
                                <span class="badge bg-light text-dark border fw-medium px-3 py-2 rounded-pill">
                                    <i class="bi bi-calendar-event me-2 text-primary"></i> <?= $b['periode'] ?>
                                </span>
                            </td>
                            <td class="fw-semibold text-dark"><?= $b['nama_cabang'] ?></td>
                            <td class="fw-bold">Rp <?= number_format($b['total_omset'],0,',','.') ?></td>
                            <td class="text-primary fw-bold">Rp <?= number_format($b['bagian_mitra'],0,',','.') ?></td>
                            <td class="text-success fw-bold">Rp <?= number_format($b['bagi_hasil_pusat'],0,',','.') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
