<?php
/**
 * @var int $total
 */
?>

<nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan</a>
   <a href="<?= url_to('logout') ?>">Logout</a>
</nav>

<h2>Dashboard Petugas</h2>
<p>Total keluhan: <?= $total ?></p>
<p>Belum ditangani: <?= $baru ?></p>

<table>
    <tr>
        <th>No Laporan</th>
        
    </tr>
</table>