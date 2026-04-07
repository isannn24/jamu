<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
    <div>
        <h3 class="fw-bold mb-0">Tambah User Mitra Baru</h3>
        <p class="text-muted">Buat akun akses untuk cabang franchise yang baru bergabung</p>
    </div>
    <a href="<?= base_url('admin/user') ?>" class="btn btn-light px-4 border rounded-pill shadow-sm">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
    </a>
</div>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger border-0 shadow-sm animate__animated animate__shakeX mb-4">
        <i class="bi bi-exclamation-circle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm animate__animated animate__fadeInUp">
    <div class="card-body p-5">
        <form action="<?= base_url('admin/user/simpan') ?>" method="post">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark mb-2">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-person text-muted"></i></span>
                        <input type="text" name="username" class="form-control bg-light border-0 p-3" placeholder="Contoh: mitra_cabang_1" required value="<?= old('username') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark mb-2">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-lock text-muted"></i></span>
                        <input type="text" name="password" class="form-control bg-light border-0 p-3" placeholder="Masukkan password awal" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold text-dark mb-2">Hubungkan ke Cabang</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-shop text-muted"></i></span>
                        <select name="id_franchise" class="form-select bg-light border-0 p-3" required>
                            <option value="">Pilih Cabang Franchise...</option>
                            <?php foreach($franchise as $f): ?>
                                <option value="<?= $f['id_franchise'] ?>"><?= $f['nama_cabang'] ?> (Pemilik: <?= $f['pemilik'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow">
                        <i class="bi bi-check-lg me-2"></i> Simpan User Baru
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
