<!DOCTYPE html>
<html>
<head>
    <title>Login - Jamu Aroma Rempah</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1abc9c;
            --secondary-color: #16a085;
            --accent-color: #f1c40f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1abc9c, #2c3e50);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .main-container {
            max-width: 1050px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .article-section {
            background: linear-gradient(135deg, rgba(26, 188, 156, 0.9), rgba(22, 160, 133, 0.9));
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .article-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .login-section {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .logo {
            width: 150px;
            margin-bottom: 25px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: translateY(-5px);
        }

        .btn-login {
            background: var(--primary-color);
            border: none;
            padding: 14px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(26, 188, 156, 0.3);
        }

        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 188, 156, 0.4);
            color: white;
        }

        .promo-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            padding: 25px;
            margin-top: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .wa-link {
            display: inline-flex;
            align-items: center;
            background: #25d366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            margin-top: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .wa-link i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .wa-link:hover {
            transform: scale(1.05);
            background: #128c7e;
            color: white;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 20px;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(26, 188, 156, 0.1);
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .feature-item i {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-right: 15px;
        }
    </style>
</head>

<body>

<div class="main-container">
    <div class="row g-0">
        <!-- Section Artikel & Promo -->
        <div class="col-md-7 article-section">
            <h1 class="fw-bold mb-4">Jamu Aroma Rempah</h1>
            <p class="lead mb-4">
                Warisan Tradisi untuk Kesehatan Modern. Menghadirkan keajaiban rempah asli Indonesia dalam setiap tegukan untuk menjaga daya tahan tubuh Anda secara alami.
            </p>
            
            <div class="mb-4">
                <h5 class="fw-bold mb-3 text-uppercase small tracking-widest">Kenapa Memilih Kami?</h5>
                <div class="feature-item">
                    <i class="bi bi-patch-check-fill"></i>
                    <span>Bahan alami pilihan tanpa pengawet sintetik</span>
                </div>
                <div class="feature-item">
                    <i class="bi bi-stars"></i>
                    <span>Resep tradisional yang terjaga keasliannya</span>
                </div>
                <div class="feature-item">
                    <i class="bi bi-shield-heart-fill"></i>
                    <span>Higienis dan kaya akan manfaat kesehatan</span>
                </div>
            </div>

            <div class="promo-card">
                <h4 class="fw-bold mb-2">Peluang Bisnis Franchise!</h4>
                <p class="opacity-75 mb-3">Jadilah bagian dari keluarga besar Jamu Aroma Rempah. Mulai bisnis minuman kesehatan Anda sendiri dengan modal terjangkau.</p>
                <a href="https://wa.me/628131554929" class="wa-link" target="_blank">
                    <i class="bi bi-whatsapp"></i> Hubungi: 08131554929
                </a>
            </div>
        </div>

        <!-- Section Login -->
        <div class="col-md-5 login-section text-center">
            <div>
                <img src="/assets/logo.png" class="logo mx-auto d-block" alt="Logo">
                <h3 class="mb-2 fw-bold text-dark">Selamat Datang</h3>
                <p class="text-muted mb-4">Masuk ke sistem monitoring</p>

                <form action="<?= base_url('login/proses') ?>" method="post" class="text-start">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" name="username" class="form-control bg-light border-0" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-0" placeholder="Password" required>
                        </div>
                    </div>

                    <button class="btn btn-login w-100 text-white btn-lg mb-3">
                        Login Sekarang <i class="bi bi-arrow-right-short ms-1"></i>
                    </button>
                </form>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger border-0 rounded-4">
                        <i class="bi bi-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="mt-4 text-muted small">
                    &copy; <?= date('Y') ?> Jamu Aroma Rempah. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>