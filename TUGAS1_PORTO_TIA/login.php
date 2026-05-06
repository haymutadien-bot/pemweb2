<?php
// LOGIN.PHP - Halaman Login (standalone, tidak menggunakan layout utama)
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

require_once __DIR__ . '/koneksi.php';

$error = '';
$msg_param = $_GET['msg'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username && $password) {
        $u = mysqli_real_escape_string($koneksi, $username);
        $p = mysqli_real_escape_string($koneksi, $password);
        $sql = "SELECT * FROM users WHERE username='$u' AND password='$p' LIMIT 1";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['id']       = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            $error = '❌ Username atau password salah. Silakan coba lagi.';
        }
    } else {
        $error = '⚠️ Username dan password wajib diisi.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — PortoTia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-wrapper">
    <div class="login-card">
        <!-- Logo -->
        <div class="login-logo">
            <div style="font-size:3rem; margin-bottom:8px;">🔐</div>
            <h2>Porto<span style="color:var(--accent);">Tia</span></h2>
            <p>Masuk ke panel administrasi</p>
        </div>

        <?php if ($msg_param === 'auth'): ?>
        <div class="alert-porto alert-porto-danger mb-3">
            🔒 Anda harus login terlebih dahulu untuk mengakses halaman tersebut.
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div class="alert-porto alert-porto-danger mb-3"><?= $error ?></div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="POST" action="login.php">
            <div class="mb-4">
                <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Username</label>
                <input type="text" name="username" class="form-control form-control-lg"
                       placeholder="Masukkan username"
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                       style="border:1.5px solid var(--border); border-radius:10px;" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Password</label>
                <input type="password" name="password" class="form-control form-control-lg"
                       placeholder="Masukkan password"
                       style="border:1.5px solid var(--border); border-radius:10px;" required>
            </div>
            <button type="submit" class="btn-porto-primary w-100 justify-content-center"
                    style="padding:13px; font-size:1rem; border-radius:10px;">
                🚀 Login
            </button>
        </form>

        <!-- Hint -->
        <div class="mt-4 p-3 rounded" style="background:rgba(26,26,46,0.04); border:1px solid var(--border); font-size:0.82rem;">
            <strong class="text-muted">Info Login:</strong><br>
            <span class="text-muted">Admin: <code>admin123</code> / <code>passAdmin#1</code></span><br>
            <span class="text-muted">User: <code>user_biasa</code> / <code>passUser#2</code></span>
        </div>

        <div class="text-center mt-3">
            <a href="index.php" style="color:var(--accent); font-size:0.88rem; text-decoration:none;">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
