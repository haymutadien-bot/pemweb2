<?php
// HOME.PHP - Halaman Beranda dengan Card Horizontal Bootstrap
?>
<div class="section-title">Selamat Datang 👋</div>
<p class="section-subtitle">Kenali lebih dekat siapa saya melalui profil di bawah ini.</p>

<!-- Profile Card Horizontal (Bootstrap Card) -->
<div class="profile-card-horizontal mb-4">
    <div class="profile-card-img">
        <?php
        $foto = __DIR__ . '/img/FOTO_TIA.jpg';
        if (file_exists($foto)): ?>
            <img src="img/FOTO_TIA.jpg" alt="Foto Tia" />
        <?php else: ?>
            <div class="photo-placeholder">
                <span>👩</span>
                <small style="font-size:0.75rem; margin-top:8px;">FOTO_TIA.jpeg</small>
            </div>
        <?php endif; ?>
        <div class="img-overlay"></div>
    </div>
    <div class="profile-card-body">
        <div class="profile-badge">⭐ Mahasiswa Aktif</div>
        <h2>Haya Muthia</h2>
        <p class="text-muted mb-4" style="font-size:0.95rem; line-height:1.7;">
            Saya adalah mahasiswa Sistem Informasi yang memiliki ketertarikan besar pada
            pengembangan web, desain antarmuka, dan teknologi informasi. Saya percaya bahwa
            teknologi dapat membuat dunia menjadi tempat yang lebih baik.
        </p>
        <ul class="profile-info-list">
            <li>
                <span class="info-label">Nama</span>
                <span>Haya Muthia</span>
            </li>
            <li>
                <span class="info-label">Program Studi</span>
                <span>Sistem Informasi</span>
            </li>
            <li>
                <span class="info-label">Universitas</span>
                <span>STT Terpadu Nurul Fikri</span>
            </li>
            <li>
                <span class="info-label">Email</span>
                <span>haymut.adien@gmail.com</span>
            </li>
            <li>
                <span class="info-label">Lokasi</span>
                <span>Indonesia</span>
            </li>
            <li>
                <span class="info-label">Keahlian</span>
                <span>
                    <span class="badge badge-accent me-1">PHP</span>
                    <span class="badge badge-accent me-1">HTML/CSS</span>
                    <span class="badge badge-accent me-1">JavaScript</span>
                    <span class="badge badge-accent">MySQL</span>
                </span>
            </li>
        </ul>
        <div class="mt-4 d-flex gap-2 flex-wrap">
            <a href="index.php?hal=about" class="btn-porto-primary">👤 About Me</a>
            <a href="index.php?hal=contact" class="btn-porto-secondary">📬 Hubungi Saya</a>
        </div>
    </div>
</div>

<!-- Stats Row -->
<div class="row g-3 mt-1">
    <div class="col-md-4">
        <div class="card-porto text-center p-3">
            <div style="font-size:2rem; margin-bottom:6px;">🎓</div>
            <h5 style="font-family:var(--font-display); color:var(--primary);">Pendidikan</h5>
            <p class="text-muted small mb-0">Rekam jejak dari TK hingga Kuliah</p>
            <a href="index.php?hal=input" class="btn-porto-primary mt-2 d-inline-flex" style="font-size:0.8rem;padding:6px 14px;">Lihat Studies</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-porto text-center p-3">
            <div style="font-size:2rem; margin-bottom:6px;">💻</div>
            <h5 style="font-family:var(--font-display); color:var(--primary);">Project</h5>
            <p class="text-muted small mb-0">Portofolio web berbasis PHP &amp; Bootstrap</p>
            <span class="badge-accent mt-2 d-inline-block">Aktif</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-porto text-center p-3">
            <div style="font-size:2rem; margin-bottom:6px;">🏆</div>
            <h5 style="font-family:var(--font-display); color:var(--primary);">Organisasi</h5>
            <p class="text-muted small mb-0">Aktif di berbagai kegiatan kampus</p>
            <a href="index.php?hal=about" class="btn-porto-primary mt-2 d-inline-flex" style="font-size:0.8rem;padding:6px 14px;">Selengkapnya</a>
        </div>
    </div>
</div>
