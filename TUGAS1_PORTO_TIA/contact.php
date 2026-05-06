<?php
// CONTACT.PHP - Halaman Contact Me dengan Card Groups Bootstrap
?>
<div class="section-title">Contact Me 📬</div>
<p class="section-subtitle">Temukan saya di berbagai platform media sosial berikut ini.</p>

<!-- Card Groups for Social Media -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">

    <?php
    $sosmed = [
        [
            'platform' => 'Instagram',
            'icon'     => '📸',
            'handle'   => '@tia_dev',
            'link'     => 'https://instagram.com/',
            'color'    => 'linear-gradient(45deg,#405de6,#5851db,#833ab4,#c13584,#e1306c,#fd1d1d)',
            'desc'     => 'Foto, story, dan momen sehari-hari',
            'btn_color'=> '#e1306c',
        ],
        [
            'platform' => 'GitHub',
            'icon'     => '💻',
            'handle'   => '@tia-dev',
            'link'     => 'https://github.com/',
            'color'    => 'linear-gradient(135deg,#24292e,#444d56)',
            'desc'     => 'Repository project dan kode sumber',
            'btn_color'=> '#24292e',
        ],
        [
            'platform' => 'Whatsapp',
            'icon'     => '💼',
            'handle'   => 'Tia | sisfor',
            'link'     => 'https://wa.me/',
            'color'    => 'linear-gradient(135deg,#25d366,#128c7e)',
            'desc'     => 'Chat langsung via Whatsapp',
            'btn_color'=> '#0077b5',
        ],
        [
            'platform' => 'Twitter / X',
            'icon'     => '🐦',
            'handle'   => '@tia_tweet',
            'link'     => 'https://twitter.com/',
            'color'    => 'linear-gradient(135deg,#1da1f2,#0d8ecf)',
            'desc'     => 'Update terkini dan diskusi teknologi',
            'btn_color'=> '#1da1f2',
        ],
        [
            'platform' => 'YouTube',
            'icon'     => '🎬',
            'handle'   => 'Tia Channel',
            'link'     => 'https://youtube.com/',
            'color'    => 'linear-gradient(135deg,#ff0000,#c4302b)',
            'desc'     => 'Tutorial dan video teknologi',
            'btn_color'=> '#ff0000',
        ],
        [
            'platform' => 'Email',
            'icon'     => '📧',
            'handle'   => 'tia@email.com',
            'link'     => 'mailto:tia@email.com',
            'color'    => 'linear-gradient(135deg,#ea4335,#fbbc05)',
            'desc'     => 'Hubungi langsung via email',
            'btn_color'=> '#ea4335',
        ],
    ];
    foreach ($sosmed as $s): ?>

    <div class="col">
        <div class="contact-card h-100">
            <!-- Icon Area (image placeholder with gradient) -->
            <div class="contact-icon" style="background:<?= $s['color'] ?>; width:70px; height:70px;">
                <span style="font-size:2rem; line-height:1;"><?= $s['icon'] ?></span>
            </div>
            <!-- Keterangan -->
            <h6 class="fw-bold mb-1" style="font-family:var(--font-display);"><?= $s['platform'] ?></h6>
            <p class="text-muted small mb-2"><?= $s['desc'] ?></p>
            <!-- Handle -->
            <div class="mb-3">
                <span class="badge-level" style="background:rgba(0,0,0,0.06); font-size:0.8rem;"><?= htmlspecialchars($s['handle']) ?></span>
            </div>
            <!-- Link sosmed di bawah icon -->
            <a href="<?= $s['link'] ?>" target="_blank" rel="noopener"
               class="btn btn-sm fw-semibold text-white stretched-link"
               style="background:<?= $s['btn_color'] ?>; border:none; border-radius:50px; padding:5px 18px; font-size:0.82rem;">
                Kunjungi →
            </a>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<!-- Contact Form -->
<div class="card-porto p-0 mt-2">
    <div class="card-header-porto">
        📩 &nbsp;Kirim Pesan Langsung
    </div>
    <div class="p-4">
        <form action="#" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap Anda" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email@anda.com" required>
                </div>
                <div class="col-12">
                    <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Pesan</label>
                    <textarea name="pesan" class="form-control" rows="4" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-porto-primary">📨 Kirim Pesan</button>
                </div>
            </div>
        </form>
    </div>
</div>
