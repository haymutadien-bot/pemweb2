<?php
// ABOUT.PHP - Halaman About Me dengan Accordion Bootstrap
?>
<div class="section-title">About Me 👤</div>
<p class="section-subtitle">Kenali hobi, makanan favorit, dan pengalaman organisasi saya.</p>

<div class="accordion accordion-porto" id="accordionAbout">

    <!-- Hobi -->
    <div class="accordion-item border-0 mb-3 rounded overflow-hidden shadow-sm">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHobi">
                🎨 &nbsp; Hobi Saya
            </button>
        </h2>
        <div id="collapseHobi" class="accordion-collapse collapse show" data-bs-parent="#accordionAbout">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="text-center p-3 rounded" style="background:rgba(233,69,96,0.06); border:1px solid rgba(233,69,96,0.12);">
                            <div style="font-size:2.2rem;">💻</div>
                            <div class="fw-semibold mt-2" style="font-size:0.9rem;">Coding</div>
                            <small class="text-muted">Web Development</small>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-center p-3 rounded" style="background:rgba(245,166,35,0.06); border:1px solid rgba(245,166,35,0.12);">
                            <div style="font-size:2.2rem;">📖</div>
                            <div class="fw-semibold mt-2" style="font-size:0.9rem;">Membaca</div>
                            <small class="text-muted">Buku Novel</small>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-center p-3 rounded" style="background:rgba(26,26,46,0.05); border:1px solid rgba(26,26,46,0.1);">
                            <div style="font-size:2.2rem;">🎵</div>
                            <div class="fw-semibold mt-2" style="font-size:0.9rem;">Musik</div>
                            <small class="text-muted">Mendengarkan Lagu</small>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-center p-3 rounded" style="background:rgba(40,167,69,0.06); border:1px solid rgba(40,167,69,0.12);">
                            <div style="font-size:2.2rem;">🏸</div>
                            <div class="fw-semibold mt-2" style="font-size:0.9rem;">Badminton</div>
                            <small class="text-muted">Olahraga</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Favorite Menu -->
    <div class="accordion-item border-0 mb-3 rounded overflow-hidden shadow-sm">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu">
                🍜 &nbsp; Favorite Menu
            </button>
        </h2>
        <div id="collapseMenu" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">🍜</span>
                            <div>
                                <div class="fw-semibold">Mie Ayam</div>
                                <small class="text-muted">Makanan Favorit No. 1</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">🐙</span>
                            <div>
                                <div class="fw-semibold">takoyaki</div>
                                <small class="text-muted">Makanan Jepang</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">🧋</span>
                            <div>
                                <div class="fw-semibold">Boba / Milktea</div>
                                <small class="text-muted">Minuman Kesukaan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">🥙</span>
                            <div>
                                <div class="fw-semibold">Kebab</div>
                                <small class="text-muted">Turki Food</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">🍟</span>
                            <div>
                                <div class="fw-semibold">kentang goreng</div>
                                <small class="text-muted">Makanan Ringan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex align-items-center gap-3 p-3 rounded" style="background:#f8f9fa; border:1px solid #e9ecef;">
                            <span style="font-size:2rem;">☕</span>
                            <div>
                                <div class="fw-semibold">Kopi Susu</div>
                                <small class="text-muted">Teman ketika stress</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengalaman Organisasi -->
    <div class="accordion-item border-0 mb-3 rounded overflow-hidden shadow-sm">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrg">
                🏆 &nbsp; Pengalaman Organisasi
            </button>
        </h2>
        <div id="collapseOrg" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
            <div class="accordion-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3 p-3 rounded" style="background:#f8f9fa; border-left:4px solid #e94560;">
                        <div style="min-width:48px; text-align:center;">
                            <div style="font-size:1.8rem;">🎓</div>
                            <small class="text-muted" style="font-size:0.75rem;">2025-2026</small>
                        </div>
                        <div>
                            <div class="fw-semibold">Senada</div>
                            <small class="text-muted">Anggota controller</small>
                            <p class="mb-0 mt-1 small text-muted">Bertugas mengelola surat surat.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 p-3 rounded" style="background:#f8f9fa; border-left:4px solid #f5a623;">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keahlian -->
    <div class="accordion-item border-0 mb-3 rounded overflow-hidden shadow-sm">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSkill">
                ⚡ &nbsp; Keahlian / Skills
            </button>
        </h2>
        <div id="collapseSkill" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
            <div class="accordion-body">
                <div class="row g-2">
                    <?php
                    $skills = [
                        ['PHP', 60, 'var(--accent)'],
                        ['HTML/CSS', 71, '#0f3460'],
                        ['JavaScript', 70, 'var(--accent2)'],
                        ['MySQL', 62, '#28a745'],
                        ['Bootstrap', 72, '#7952b3'],
                        ['Git', 69, '#e84e3c'],
                    ];
                    foreach ($skills as $s): ?>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold small"><?= $s[0] ?></span>
                            <span class="small text-muted"><?= $s[1] ?>%</span>
                        </div>
                        <div class="progress mb-2" style="height:8px; border-radius:10px;">
                            <div class="progress-bar" style="width:<?= $s[1] ?>%; background:<?= $s[2] ?>; border-radius:10px;"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>
