<?php
// SIDEBAR.PHP - Bootstrap List Group Component (3 grid)
$current = isset($_GET['hal']) ? $_GET['hal'] : 'home';
?>
<aside class="porto-sidebar">
    <div class="sidebar-title">Navigasi</div>
    <ul class="list-group sidebar-list">
        <li class="list-group-item <?= ($current=='home')?'active':'' ?>">
            <a href="index.php?hal=home" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">🏠</span> Beranda
            </a>
        </li>
        <li class="list-group-item <?= ($current=='about')?'active':'' ?>">
            <a href="index.php?hal=about" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">👤</span> About Me
            </a>
        </li>
        <li class="list-group-item <?= ($current=='contact')?'active':'' ?>">
            <a href="index.php?hal=contact" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">📬</span> Contact Me
            </a>
        </li>
    </ul>

    <div class="sidebar-title mt-4">My Studies</div>
    <ul class="list-group sidebar-list">
        <li class="list-group-item <?= ($current=='kelas')?'active':'' ?>">
            <a href="index.php?hal=kelas" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">🎓</span> Level
            </a>
        </li>
        <li class="list-group-item <?= ($current=='input')?'active':'' ?>">
            <a href="index.php?hal=input" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">📝</span> Studies
            </a>
        </li>
    </ul>

    <?php if (isset($_SESSION['username'])): ?>
    <div class="sidebar-title mt-4">Akun</div>
    <ul class="list-group sidebar-list">
        <li class="list-group-item">
            <a href="logout.php" class="stretched-link text-decoration-none d-flex align-items-center gap-2 w-100" style="color:inherit;">
                <span class="sidebar-icon">🚪</span> Logout
            </a>
        </li>
    </ul>
    <?php endif; ?>
</aside>
