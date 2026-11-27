<?php

/**
 * @var String $nama
 * /**
 * @var array $laporan
 * @var \CodeIgniter\Pager\Pager $pager
 */
helper('auth'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>





    <div class="menu-kanan">
        <a href="<?= base_url('lapor') ?>">Lapor</a>
        <a href="<?= url_to('logout') ?>">Logout</a>
        <a href="<?=  base_url('export') ?>">export</a>
    </div>

<h2>Riwayat Laporan <?= esc(user()->nama) ?></h2>
<hr>
<?php if (session()->getFlashdata('pesan')): ?>
    <p style="color:green"><?= esc(session()->getFlashdata('pesan')) ?></p>
<?php endif ?>

<table border="1" cellpadding="6">
    <tr>
        <th>Tanggal</th>
        <th>Objek</th>
        <th>Lokasi</th>
        <th>Status</th>
        <th>Tanggapan Petugas</th>
        <th></th>
    </tr>
    <?php if (empty($laporan)): ?>
        <tr>
            <td colspan="6">Anda belum pernah melapor.</td>
        </tr>
    <?php endif ?>
    <?php foreach ($laporan as $l): ?>
        <tr>
            <td><?= esc($l['created_at']) ?></td>
            <td><?= esc($l['objek']) ?></td>
            <td><?= esc($l['gedung']) ?> / <?= esc($l['ruangan']) ?></td>
            <td><?= esc($l['status']) ?></td>
            <td><?= esc($l['tanggapan'] ?? '-') ?></td>
            <td><a href="<?= base_url('riwayat/' . $l['id']) ?>">Detail</a></td>
        </tr>
    <?php endforeach ?>
</table>

</body>

</html>