<?php

/**
 * @var String $username
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <h1>Selamat datang Baginda <?= esc($username) ?></h1>




    <div class="menu-kanan">
        <a href="<?= base_url('lapor') ?>">Lapor</a>
        <a href="<?= base_url('keluhan') ?>">Riwayat Lapor</a>
        <a href="<?= url_to('logout') ?>">Logout</a>
    </div>
    <hr>
</body>

</html>