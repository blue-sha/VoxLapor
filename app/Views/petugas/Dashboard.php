<?php
/**
 * @var int $total
 * @var int $baru
 */
?>

<nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan (<?= $baru ?> baru)</a>
</nav>

<h2>Dashboard Petugas</h2>
<p>Total keluhan: <?= $total ?></p>
<p>Belum ditangani: <?= $baru ?></p>