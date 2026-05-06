<?php
// MENU.PHP - Bootstrap Navbar Component (12 grid)
$current = isset($_GET['hal']) ? $_GET['hal'] : 'home';
?>
<nav class="navbar navbar-expand-lg navbar-porto">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <span style="color:#e94560;">✦</span> Porto<span style="color:#f5a623;">Tia</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($current=='home')?'active':'' ?>" href="index.php?hal=home">
                        🏠 Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current=='about')?'active':'' ?>" href="index.php?hal=about">
                        👤 About Me
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current=='contact')?'active':'' ?>" href="index.php?hal=contact">
                        📬 Contact Me
                    </a>
                </li>
                <!-- My Studies Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= (in_array($current,['kelas','input']))?'active':'' ?>"
                       href="#" role="button" data-bs-toggle="dropdown">
                        📚 My Studies
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="index.php?hal=kelas">
                                🎓 Level (TK–Kuliah)
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?hal=input">
                                📝 Studies
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Login / User Info -->
                <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle user-badge" href="#" role="button" data-bs-toggle="dropdown">
                        👤 <?= htmlspecialchars($_SESSION['username']) ?>
                        <small class="opacity-60">(<?= htmlspecialchars($_SESSION['role']) ?>)</small>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="logout.php">🚪 Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($current=='login')?'active':'' ?>" href="login.php">
                        🔐 Login
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
