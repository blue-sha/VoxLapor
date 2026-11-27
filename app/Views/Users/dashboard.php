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
        <a href="<?= base_url('export') ?>">export</a>
        <a href="<?= base_url('Profil') ?>">Profil</a>
        <a href="<?= url_to('logout') ?>">Logout</a>
    </div>

    <h2>Riwayat Laporan <?= esc(user()->full_name) ?></h2>
    <hr>
    <?php if (session()->getFlashdata('pesan')): ?>
        <p style="color:green"><?= esc(session()->getFlashdata('pesan')) ?></p>
    <?php endif ?>

    <table border="1" cellpadding="6" cellspacing="4" >
        <tr>
            <th colspan="6">Daftar Riwayat Pengaduan</th>
        </tr>
        <?php if (empty($laporan)): ?>
            <tr>
                <td colspan="6">Anda belum pernah melapor.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($laporan as $l): ?>
            <tr>
                <td><?= esc($l['nama_pelapor']) ?></td>
                <td>
                    <b><?= esc($l['objek']) ?></b> |
                    <?= esc($l['nomor_laporan']) ?>
                    | <?= esc($l['prioritas'])  ?> |
                    <?=  esc($l['jabatan']) ?>
                </td>
                <td><?= esc($l['gedung']) ?> - <?= esc($l['lantai']) ?> - <?= esc($l['ruangan']) ?> |
                    <?= esc($l['keluhan']) ?></td>
                <td><?= esc($l['status']) ?></td>
                <td ><a href="<?= base_url('detail/' . $l['id']) ?>">Detail</a></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>