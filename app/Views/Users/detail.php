<?php /** @var array $laporan */ ?>
<a href="<?= base_url('riwayat') ?>"><button type="button">Kembali</button></a>
<h2>Detail Laporan</h2>

<p><b>Tanggal:</b> <?= esc($laporan['created_at']) ?></p>
<p><b>Lokasi:</b> <?= esc($laporan['gedung']) ?>, lantai <?= esc($laporan['lantai']) ?>, <?= esc($laporan['ruangan']) ?></p>
<p><b>Objek:</b> <?= esc($laporan['objek']) ?></p>
<p><b>Dampak:</b> <?= esc($laporan['dampak']) ?></p>
<p><b>Prioritas:</b> <?= esc($laporan['prioritas']) ?></p>
<p><b>Keluhan:</b><br><?= nl2br(esc($laporan['keluhan'])) ?></p>

<?php if ($laporan['foto']): ?>
    <img src="<?= base_url('uploads/laporan/' . $laporan['foto']) ?>" width="300">
<?php endif ?>

<hr>
<p><b>Status:</b> <?= esc($laporan['status']) ?></p>
<p><b>Tanggapan petugas:</b><br><?= esc($laporan['tanggapan'] ?? 'Belum ada tanggapan.') ?></p>