<?php
/** @var array $laporan */
?>
<nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan</a>
</nav>

<h2>Detail Keluhan</h2>

<p><b>Pelapor:</b> <?= esc($laporan['nama_pelapor']) ?> (<?= esc($laporan['jabatan']) ?>)</p>
<p><b>Unit/Prodi:</b> <?= esc($laporan['unit_program']) ?></p>
<p><b>Kontak:</b> <?= esc($laporan['kontak']) ?></p>
<p><b>Lokasi:</b> <?= esc($laporan['gedung']) ?>, lantai <?= esc($laporan['lantai']) ?>, <?= esc($laporan['ruangan']) ?></p>
<p><b>Objek:</b> <?= esc($laporan['objek']) ?></p>
<p><b>Dampak:</b> <?= esc($laporan['dampak']) ?></p>
<p><b>Prioritas:</b> <?= esc($laporan['prioritas']) ?></p>
<p><b>Tanggal ditemukan:</b> <?= esc($laporan['tanggal_ditemukan']) ?></p>
<p><b>Keluhan:</b><br><?= nl2br(esc($laporan['keluhan'])) ?></p>

<?php if ($laporan['foto']): ?>
    <img src="<?= base_url('uploads/laporan/' . $laporan['foto']) ?>" width="300">
<?php endif ?>

<hr>

<form action="<?= base_url('petugas/proses/' . $laporan['id']) ?>" method="post">
    <?= csrf_field() ?>
    <label>Status:</label>
    <select name="status">
        <?php foreach (['baru', 'diproses', 'selesai'] as $s): ?>
            <option value="<?= $s ?>" <?= $laporan['status'] === $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
        <?php endforeach ?>
    </select><br>

    <label>Tanggapan:</label><br>
    <textarea name="tanggapan" rows="4"><?= esc($laporan['tanggapan'] ?? '') ?></textarea><br>

    <button type="submit">Simpan</button>
</form>