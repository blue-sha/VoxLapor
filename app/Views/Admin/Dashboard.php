<?php
/**
 * @var string $username
 */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h3>Dashboard Admin</h3>
    <p>Selamat datang, <?= esc($username) ?></p>
    <a href="<?= url_to('logout') ?>">Logout</a>
</body>
</html>