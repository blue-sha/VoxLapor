<?php
/**
 * @var int $masuk
 * @var int $baru
 * @var int $proses
 * @var int $tindak_lanjut
 * @var int $selesai
 * @var int $ditolak
 * @var int $menunggu
 */
helper('auth');
?>
<nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan</a> |
    <a href="<?= url_to('logout') ?>">Logout</a>
</nav>

<h2>Dashboard Petugas</h2>
<p>Halo, <?= esc(user()->nama ?: user()->username) ?></p>

<div>Laporan Masuk: <?= $masuk ?></div>
<div>Menunggu: <?= $menunggu ?></div>
<div>Proses: <?= $proses ?></div>
<div>Tindak Lanjut: <?= $tindak_lanjut ?></div>
<div>Selesai: <?= $selesai ?></div>
<div>Ditolak: <?= $ditolak ?></div>