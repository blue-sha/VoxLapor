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

    <div>
        <p>Laporan Masuk: <?= $total; ?></p>
        <p>Proses: <?= $totalDiproses; ?></p>
        <p>Tindak lanjut: <?= $totalTindakLanjut; ?></p>
        <p>Selesai: <?= $totalSelesai; ?></p>
        <p>Ditolak: <?= $totalDitolak; ?></p>
    </div>

    <div>
        <table border=1 cellpadding=2>
            <tr>
                <th colspan=5>Daftar Laporan</th>
            </tr>
            <tr>
                <th>Nomor Pengaduan</th>
                <th>Pelapor</th>
                <th>Objek</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($laporan as $satuLapor): ?>
                <tr>
                    <td><?= esc($satuLapor['nomor_laporan']); ?></td>
                    <td><?= esc($satuLapor['nama_pelapor']); ?></td>
                    <td><?= esc($satuLapor['objek']); ?></td>
                    <td><?= esc($satuLapor['status']); ?></td>
                    <td><a href="<?= base_url('/detail'); ?>">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>