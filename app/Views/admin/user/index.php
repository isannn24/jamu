<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
    <div>
        <h3 class="fw-bold mb-0">Manajemen User Mitra</h3>
        <p class="text-muted">Kelola akun akses untuk setiap cabang franchise</p>
    </div>
    <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary px-4 rounded-pill shadow-sm">
        <i class="bi bi-person-plus-fill me-2"></i> Tambah User Baru
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm animate__animated animate__fadeIn mb-4">
        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm animate__animated animate__fadeInUp">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted small text-uppercase fw-bold">
                    <tr>
                        <th class="ps-4 py-3">No</th>
                        <th class="py-3">Username</th>
                        <th class="py-3">Cabang / Outlet</th>
                        <th class="py-3">Pemilik</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($users)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-3 opacity-25"></i>
                                Belum ada user mitra yang terdaftar
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php $no=1; foreach($users as $u): ?>
                    <tr>
                        <td class="ps-4 fw-medium text-muted"><?= $no++ ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3" style="width: 40px; height: 40px; border-radius: 10px; background: #e0f2f1; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person text-primary fs-5"></i>
                                </div>
                                <span class="fw-bold text-dark"><?= $u['username'] ?></span>
                            </div>
                        </td>
                        <td class="fw-semibold text-secondary"><?= $u['nama_cabang'] ?? '-' ?></td>
                        <td class="text-muted small"><?= $u['pemilik'] ?? '-' ?></td>
                        <td class="text-center pe-4">
                            <a href="<?= base_url('admin/user/hapus/'.$u['id_user']) ?>" class="btn btn-outline-danger btn-sm border-0" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                <i class="bi bi-trash3 fs-6"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
