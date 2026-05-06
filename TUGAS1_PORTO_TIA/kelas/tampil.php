<?php
// KELAS/TAMPIL.PHP - Halaman CRUD Level (TK, SD, SMP, dst)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../koneksi.php';
require_once __DIR__ . '/../models/kelas.php';

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

$msg = '';
$edit_data = null;

// PROSES INSERT - hanya admin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $is_admin) {
    if ($_POST['action'] === 'insert') {
        $nama = trim($_POST['nama'] ?? '');
        if ($nama !== '') {
            if (insertKelas($koneksi, $nama)) {
                $msg = ['type' => 'success', 'text' => '✅ Level berhasil ditambahkan!'];
            } else {
                $msg = ['type' => 'danger', 'text' => '❌ Gagal menambahkan level.'];
            }
        } else {
            $msg = ['type' => 'danger', 'text' => '⚠️ Nama level tidak boleh kosong.'];
        }
    }

    if ($_POST['action'] === 'update') {
        $id   = (int)($_POST['id'] ?? 0);
        $nama = trim($_POST['nama'] ?? '');
        if ($id > 0 && $nama !== '') {
            if (updateKelas($koneksi, $id, $nama)) {
                $msg = ['type' => 'success', 'text' => '✅ Level berhasil diperbarui!'];
            } else {
                $msg = ['type' => 'danger', 'text' => '❌ Gagal memperbarui level.'];
            }
        }
    }
}

// PROSES DELETE - hanya admin
if (isset($_GET['delete']) && $is_admin) {
    $id = (int)$_GET['delete'];
    if (deleteKelas($koneksi, $id)) {
        $msg = ['type' => 'success', 'text' => '🗑 Level berhasil dihapus!'];
    } else {
        $msg = ['type' => 'danger', 'text' => '❌ Gagal menghapus level.'];
    }
}

// AMBIL DATA EDIT - hanya admin
if (isset($_GET['edit']) && $is_admin) {
    $edit_data = getKelasById($koneksi, (int)$_GET['edit']);
}

$data_kelas = getAllKelas($koneksi);
?>

<div class="crud-header">
    <div>
        <div class="section-title">🎓 Level Pendidikan</div>
        <p class="section-subtitle mb-0">Data level pendidikan (TK, SD, SMP, SMA, Kuliah)</p>
    </div>
    <?php if ($is_admin): ?>
    <button class="btn-porto-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        ➕ Tambah Level
    </button>
    <?php endif; ?>
</div>

<?php if ($msg): ?>
<div class="alert-porto alert-porto-<?= $msg['type'] ?> mb-3"><?= $msg['text'] ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['username']) && !$is_admin): ?>
<div class="mb-3 p-3 rounded" style="background:#eff6ff; border-left:4px solid #3b82f6; font-size:13px; color:#1d4ed8;">
    👤 Anda login sebagai <strong>user</strong>. Hanya dapat melihat data.
</div>
<?php elseif (!isset($_SESSION['username'])): ?>
<div class="mb-3 p-3 rounded" style="background:#f8fafc; border-left:4px solid #94a3b8; font-size:13px; color:#64748b;">
    🔓 Anda belum login. <a href="login.php" style="color:#e84065; font-weight:600;">Login sebagai admin</a> untuk mengelola data.
</div>
<?php endif; ?>

<!-- Tabel Data -->
<div style="overflow-x:auto;">
    <table class="table-porto w-100">
        <thead>
            <tr>
                <th width="60">No</th>
                <th>ID</th>
                <th>Nama Level</th>
                <?php if ($is_admin): ?>
                <th width="160">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data_kelas)): ?>
            <tr><td colspan="<?= $is_admin ? 4 : 3 ?>" class="no-data"><i>📭</i>Belum ada data level. Silakan tambah data.</td></tr>
            <?php else: ?>
            <?php foreach ($data_kelas as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><span class="badge-level"><?= $row['id'] ?></span></td>
                <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                <?php if ($is_admin): ?>
                <td>
                    <a href="?hal=kelas&edit=<?= $row['id'] ?>" class="btn-edit me-1">✏️ Edit</a>
                    <a href="?hal=kelas&delete=<?= $row['id'] ?>"
                       onclick="return confirm('Yakin hapus level: <?= htmlspecialchars($row['nama']) ?>?')"
                       class="btn-delete">🗑 Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if ($is_admin): ?>
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:var(--radius); overflow:hidden;">
            <div class="modal-header" style="background:var(--primary); color:white;">
                <h5 class="modal-title" style="font-family:var(--font-display);">➕ Tambah Level Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="index.php?hal=kelas">
                <input type="hidden" name="action" value="insert">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Nama Level</label>
                        <input type="text" name="nama" class="form-control"
                               placeholder="Contoh: TK, SD, SMP, SMA, Kuliah" required>
                        <small class="text-muted">Masukkan nama level pendidikan.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-porto-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php if ($edit_data): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = new bootstrap.Modal(document.getElementById('modalEdit'));
    modal.show();
});
</script>
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:var(--radius); overflow:hidden;">
            <div class="modal-header" style="background:#f5a623; color:white;">
                <h5 class="modal-title" style="font-family:var(--font-display);">✏️ Edit Level</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        onclick="window.location='index.php?hal=kelas'"></button>
            </div>
            <form method="POST" action="index.php?hal=kelas">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Nama Level</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= htmlspecialchars($edit_data['nama']) ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php?hal=kelas" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn-porto-primary">💾 Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>