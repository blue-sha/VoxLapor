<?php
/**
 * @var String $nama
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h3>Selamat datang Baginda <?= esc($nama) ?></h3>

    <a href="<?= url_to('logout') ?>">Logout</a>
</body>
</html>