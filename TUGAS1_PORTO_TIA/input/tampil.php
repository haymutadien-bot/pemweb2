<?php
// INPUT/TAMPIL.PHP - Halaman CRUD Studies (tb_input)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../koneksi.php';
require_once __DIR__ . '/../models/produk.php';
require_once __DIR__ . '/../models/kelas.php';

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

$msg = '';
$edit_data = null;

// HANDLE FILE UPLOAD
function handleFotoUpload($file, $old_foto = '') {
    if (isset($file) && $file['error'] === 0) {
        $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp'];
        if (in_array($ext, $allowed) && $file['size'] < 2048000) {
            $new_name = 'sekolah_' . time() . '_' . rand(100,999) . '.' . $ext;
            $upload   = __DIR__ . '/../dataset/' . $new_name;
            if (move_uploaded_file($file['tmp_name'], $upload)) {
                if ($old_foto && file_exists(__DIR__ . '/../dataset/' . $old_foto)) {
                    unlink(__DIR__ . '/../dataset/' . $old_foto);
                }
                return $new_name;
            }
        }
    }
    return $old_foto;
}

// INSERT - hanya admin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $is_admin) {
    if ($_POST['action'] === 'insert') {
        $foto = handleFotoUpload($_FILES['foto_sekolah'] ?? null, '');
        $data = [
            'nama'        => trim($_POST['nama'] ?? ''),
            'ilevel'      => (int)($_POST['ilevel'] ?? 0),
            'keterangan'  => trim($_POST['keterangan'] ?? ''),
            'tahun_lulus' => trim($_POST['tahun_lulus'] ?? ''),
            'foto_sekolah'=> $foto,
        ];
        if ($data['nama'] && $data['ilevel']) {
            if (insertStudies($koneksi, $data)) {
                $msg = ['type' => 'success', 'text' => '✅ Data studies berhasil ditambahkan!'];
            } else {
                $msg = ['type' => 'danger', 'text' => '❌ Gagal menambahkan data: ' . mysqli_error($koneksi)];
            }
        } else {
            $msg = ['type' => 'danger', 'text' => '⚠️ Nama sekolah dan level wajib diisi.'];
        }
    }

    if ($_POST['action'] === 'update') {
        $id  = (int)($_POST['id'] ?? 0);
        $old = getStudiesById($koneksi, $id);
        $foto = handleFotoUpload($_FILES['foto_sekolah'] ?? null, $old['foto_sekolah'] ?? '');
        $data = [
            'nama'        => trim($_POST['nama'] ?? ''),
            'ilevel'      => (int)($_POST['ilevel'] ?? 0),
            'keterangan'  => trim($_POST['keterangan'] ?? ''),
            'tahun_lulus' => trim($_POST['tahun_lulus'] ?? ''),
            'foto_sekolah'=> $foto,
        ];
        if ($id > 0 && $data['nama'] && $data['ilevel']) {
            if (updateStudies($koneksi, $id, $data)) {
                $msg = ['type' => 'success', 'text' => '✅ Data studies berhasil diperbarui!'];
            } else {
                $msg = ['type' => 'danger', 'text' => '❌ Gagal memperbarui data.'];
            }
        }
    }
}

// DELETE - hanya admin
if (isset($_GET['delete']) && $is_admin) {
    $id  = (int)$_GET['delete'];
    $old = getStudiesById($koneksi, $id);
    if ($old && $old['foto_sekolah'] && file_exists(__DIR__ . '/../dataset/' . $old['foto_sekolah'])) {
        unlink(__DIR__ . '/../dataset/' . $old['foto_sekolah']);
    }
    if (deleteStudies($koneksi, $id)) {
        $msg = ['type' => 'success', 'text' => '🗑 Data studies berhasil dihapus!'];
    } else {
        $msg = ['type' => 'danger', 'text' => '❌ Gagal menghapus data.'];
    }
}

// EDIT - hanya admin
if (isset($_GET['edit']) && $is_admin) {
    $edit_data = getStudiesById($koneksi, (int)$_GET['edit']);
}

$studies   = getAllStudies($koneksi);
$all_kelas = getAllKelas($koneksi);
?>

<div class="crud-header">
    <div>
        <div class="section-title">📝 Data Studies</div>
        <p class="section-subtitle mb-0">Rekam jejak pendidikan dari TK hingga Perguruan Tinggi</p>
    </div>
    <?php if ($is_admin): ?>
    <button class="btn-porto-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        ➕ Tambah Studies
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

<!-- Tabel -->
<div style="overflow-x:auto;">
    <table class="table-porto w-100">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Sekolah/Kampus</th>
                <th>Level</th>
                <th>Keterangan</th>
                <th>Tahun Lulus</th>
                <th>Foto</th>
                <?php if ($is_admin): ?>
                <th width="160">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($studies)): ?>
            <tr><td colspan="<?= $is_admin ? 7 : 6 ?>" class="no-data"><i>📭</i>Belum ada data studies.</td></tr>
            <?php else: ?>
            <?php foreach ($studies as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td>
                    <strong><?= htmlspecialchars($row['nama']) ?></strong>
                    <br><small class="text-muted">#<?= $row['id'] ?></small>
                </td>
                <td>
                    <span class="badge-level"><?= htmlspecialchars($row['nama_level'] ?? '-') ?></span>
                </td>
                <td style="max-width:200px;">
                    <small><?= htmlspecialchars($row['keterangan']) ?></small>
                </td>
                <td>
                    <span class="badge-accent"><?= htmlspecialchars($row['tahun_lulus']) ?></span>
                </td>
                <td>
                    <?php if (!empty($row['foto_sekolah'])): ?>
                    <img src="dataset/<?= htmlspecialchars($row['foto_sekolah']) ?>"
                         alt="foto" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
                    <?php else: ?>
                    <span class="text-muted small">—</span>
                    <?php endif; ?>
                </td>
                <?php if ($is_admin): ?>
                <td>
                    <a href="index.php?hal=input&edit=<?= $row['id'] ?>" class="btn-edit me-1">✏️ Edit</a>
                    <a href="index.php?hal=input&delete=<?= $row['id'] ?>"
                       onclick="return confirm('Yakin hapus data: <?= htmlspecialchars($row['nama']) ?>?')"
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:var(--radius);overflow:hidden;">
            <div class="modal-header" style="background:var(--primary); color:white;">
                <h5 class="modal-title" style="font-family:var(--font-display);">➕ Tambah Data Studies</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="index.php?hal=input" enctype="multipart/form-data">
                <input type="hidden" name="action" value="insert">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Nama Sekolah / Institusi</label>
                            <input type="text" name="nama" class="form-control" placeholder="Contoh: SDN 01 Jakarta" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Level</label>
                            <select name="ilevel" class="form-select" required>
                                <option value="">-- Pilih Level --</option>
                                <?php foreach ($all_kelas as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['nama']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Kota, jurusan, dsb.">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Tahun Lulus</label>
                            <input type="text" name="tahun_lulus" class="form-control" placeholder="2020">
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Foto Sekolah</label>
                            <input type="file" name="foto_sekolah" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG/PNG/GIF/WEBP. Max 2MB.</small>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:var(--radius);overflow:hidden;">
            <div class="modal-header" style="background:#f5a623; color:white;">
                <h5 class="modal-title" style="font-family:var(--font-display);">✏️ Edit Data Studies</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        onclick="window.location='index.php?hal=input'"></button>
            </div>
            <form method="POST" action="index.php?hal=input" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Nama Sekolah / Institusi</label>
                            <input type="text" name="nama" class="form-control"
                                   value="<?= htmlspecialchars($edit_data['nama']) ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Level</label>
                            <select name="ilevel" class="form-select" required>
                                <option value="">-- Pilih Level --</option>
                                <?php foreach ($all_kelas as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= ($k['id'] == $edit_data['idlevel']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($k['nama']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control"
                                   value="<?= htmlspecialchars($edit_data['keterangan']) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Tahun Lulus</label>
                            <input type="text" name="tahun_lulus" class="form-control"
                                   value="<?= htmlspecialchars($edit_data['tahun_lulus']) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-weight:600;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.5px;color:var(--gray);">Foto Sekolah</label>
                            <?php if (!empty($edit_data['foto_sekolah'])): ?>
                            <div class="mb-2">
                                <img src="dataset/<?= htmlspecialchars($edit_data['foto_sekolah']) ?>"
                                     style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:2px solid var(--border);">
                                <small class="text-muted d-block mt-1">Foto saat ini</small>
                            </div>
                            <?php endif; ?>
                            <input type="file" name="foto_sekolah" class="form-control" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php?hal=input" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn-porto-primary">💾 Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>