<!-- HEADER.PHP - Bootstrap Carousel Component (12 grid) -->
<div id="headerCarousel" class="carousel slide header-carousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="d-flex align-items-center justify-content-center" style="height:420px; background:linear-gradient(135deg,#1a1a2e 0%,#0f3460 55%,#e94560 100%); position:relative; overflow:hidden;">
                <div style="position:absolute;width:300px;height:300px;background:radial-gradient(circle,rgba(233,69,96,0.2),transparent);top:-80px;right:100px;border-radius:50%;"></div>
                <div class="carousel-caption text-start" style="left:10%;right:auto;bottom:auto;top:50%;transform:translateY(-50%);">
                    <span class="badge-role">👩‍💻 Web Developer</span>
                    <h1 class="display-4 fw-bold mb-2">Halo, Saya <span style="color:#e94560;">Tia</span></h1>
                    <p class="lead mb-4 opacity-75">Mahasiswa Sistem Informasi yang bersemangat dalam Web Development &amp; UI/UX Design</p>
                    <a href="index.php?hal=about" class="btn btn-light btn-lg me-2 fw-semibold">Tentang Saya</a>
                    <a href="index.php?hal=contact" class="btn btn-outline-light btn-lg fw-semibold">Hubungi Saya</a>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="d-flex align-items-center justify-content-center" style="height:420px; background:linear-gradient(135deg,#0f3460 0%,#16213e 55%,#f5a623 100%); position:relative; overflow:hidden;">
                <div style="position:absolute;width:250px;height:250px;background:radial-gradient(circle,rgba(245,166,35,0.2),transparent);bottom:-60px;left:80px;border-radius:50%;"></div>
                <div class="carousel-caption text-center">
                    <span class="badge-role">📚 My Studies</span>
                    <h1 class="display-4 fw-bold mb-2">Rekam Pendidikan</h1>
                    <p class="lead mb-4 opacity-75">Perjalanan belajar dari TK hingga Perguruan Tinggi dengan penuh semangat</p>
                    <a href="index.php?hal=kelas" class="btn btn-warning btn-lg fw-semibold me-2">Lihat Level</a>
                    <a href="index.php?hal=input" class="btn btn-outline-light btn-lg fw-semibold">Lihat Studies</a>
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="d-flex align-items-center justify-content-center" style="height:420px; background:linear-gradient(135deg,#e94560 0%,#1a1a2e 55%,#0f3460 100%); position:relative; overflow:hidden;">
                <div style="position:absolute;width:350px;height:350px;background:radial-gradient(circle,rgba(255,255,255,0.05),transparent);top:50%;left:50%;transform:translate(-50%,-50%);border-radius:50%;border:1px solid rgba(255,255,255,0.08);"></div>
                <div class="carousel-caption text-center">
                    <span class="badge-role">🎯 Portfolio</span>
                    <h1 class="display-4 fw-bold mb-2">Personal Portfolio</h1>
                    <p class="lead mb-4 opacity-75">Dibangun dengan Bootstrap RWD · PHP · MySQL</p>
                    <a href="index.php" class="btn btn-light btn-lg fw-semibold">Kunjungi Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
