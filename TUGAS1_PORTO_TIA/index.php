<?php
// INDEX.PHP - Main Entry Point (Layout Controller)
session_start();

$hal = isset($_GET['hal']) ? $_GET['hal'] : 'home';

// Routing sederhana - semua halaman bisa diakses tanpa login
// Aksi CRUD sudah diproteksi di dalam masing-masing file
$allowed_pages = ['home', 'about', 'contact', 'kelas', 'input'];
if (!in_array($hal, $allowed_pages)) {
    $hal = 'home';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $titles = [
            'home'    => 'Beranda',
            'about'   => 'About Me',
            'contact' => 'Contact Me',
            'kelas'   => 'Level Pendidikan',
            'input'   => 'Data Studies',
        ];
        echo ($titles[$hal] ?? 'Halaman') . ' — PortoTia';
        ?>
    </title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ┌─────────────────────────────────────────────────────┐
     │  HEADER — Bootstrap Carousel (col-12)               │
     └─────────────────────────────────────────────────────┘ -->
<?php include 'header.php'; ?>

<!-- ┌─────────────────────────────────────────────────────┐
     │  MENU — Bootstrap Navbar (col-12)                   │
     └─────────────────────────────────────────────────────┘ -->
<?php include 'menu.php'; ?>

<!-- ┌─────────────────────────────────────────────────────┐
     │  CONTENT AREA                                        │
     │  sidebar (col-3) + main (col-9)                     │
     └─────────────────────────────────────────────────────┘ -->
<div class="porto-layout">

    <!-- SIDEBAR — Bootstrap List Group (col-3) -->
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT — Dynamic Page (col-9) -->
    <main class="porto-main">
        <?php
        switch ($hal) {
            case 'home':
                include 'home.php';
                break;
            case 'about':
                include 'about.php';
                break;
            case 'contact':
                include 'contact.php';
                break;
            case 'kelas':
                include 'kelas/tampil.php';
                break;
            case 'input':
                include 'input/tampil.php';
                break;
            default:
                include 'home.php';
        }
        ?>
    </main>

</div>

<!-- ┌─────────────────────────────────────────────────────┐
     │  FOOTER — Bootstrap Alerts (col-12)                 │
     └─────────────────────────────────────────────────────┘ -->
<?php include 'footer.php'; ?>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>
</body>
</html>