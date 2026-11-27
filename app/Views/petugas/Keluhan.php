<?php
/**
 * @var array  $laporan
 * @var string $status
 * @var \CodeIgniter\Pager\Pager $pager
 */
?>
<nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan</a>
</nav>

<h2>Daftar Keluhan</h2>

<?php if (session()->getFlashdata('pesan')): ?>
    <p style="color:green"><?= esc(session()->getFlashdata('pesan')) ?></p>
<?php endif ?>

<p>
    <a href="?status=aktif">Aktif</a> |
    <a href="?status=baru">Baru</a> |
    <a href="?status=diproses">Diproses</a> |
    <a href="?status=tindak_lanjut">Tindak Lanjut</a> |
    <a href="?status=selesai">Selesai</a> |
    <a href="?status=ditolak">Ditolak</a> |
    <a href="?status=semua">Semua</a>
</p>

<table border="1" cellpadding="6">
    <tr>
        <th>Tanggal</th><th>Pelapor</th><th>Lokasi</th><th>Objek</th>
        <th>Prioritas</th><th>Status</th><th></th>
    </tr>
    <?php if (empty($laporan)): ?>
        <tr><td colspan="7">Belum ada keluhan.</td></tr>
    <?php endif ?>
    <?php foreach ($laporan as $l): ?>
    <tr>
        <td><?= esc($l['created_at']) ?></td>
        <td><?= esc($l['nama_pelapor']) ?></td>
        <td><?= esc($l['gedung']) ?> / <?= esc($l['ruangan']) ?></td>
        <td><?= esc($l['objek']) ?></td>
        <td><?= esc($l['prioritas']) ?></td>
        <td><?= esc(ucwords(str_replace('_', ' ', $l['status']))) ?></td>
        <td><a href="<?= base_url('petugas/detail/' . $l['id']) ?>">Detail</a></td>
    </tr>
    <?php endforeach ?>
</table>

<?= $pager->links() ?>