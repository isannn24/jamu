<!DOCTYPE html>
<html>
<head>
    <title>Login - Jamu Aroma Rempah</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0dfde);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 400px;
            border-radius: 25px;
            padding: 35px;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .logo {
            width: 170px;
        }

        .btn-login {
            background: #1abc9c;
            border: none;
        }

        .btn-login:hover {
            background: #16a085;
        }
    </style>
</head>

<body>

<div class="login-card text-center">

    <!-- LOGO -->
    <img src="/assets/logo.png" class="logo">

    <h4 class="mb-3">Sistem Monitoring Franchise Jamu Aroma Rempah</h4>
    <p class="text-muted mb-3">Silakan login ke sistem</p>

    <!-- FORM -->
    <form action="<?= base_url('login/proses') ?>" method="post">

        <div class="mb-3 text-start">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-login w-100 text-white">
            Login
        </button>

    </form>

    <!-- ERROR -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger mt-3">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>