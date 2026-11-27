<?= $this->extend('layout/main') ?>
<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
/**
 * @var int $total
 * @var int $baru
 */
?>

<div class="sambutan-hero" id="content-1">
    <div class="container text-light">
        <div class="row flex-column ">
            <div class="col">
                <h1 class="">Selamat datang di VoxLapor</h1>
            </div>
            <div class="mt-3">
                <h4 class="text-warning">Suara anda, Perubahan untuk kita</h4>
                <p class="lead">Sampaikan aspirasi, laporan, dan pengaduan terkait fasilitas serta sarana prasarana kampus dengan mudah dan cepat</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="judul row flex-column">
        <div class="col  d-flex flex-column align-items-center">
            <h2>Dashboard Petugas</h2>
            <h6>kelola laporan, melakukan verifikasi, dan tindak lanjut</h6>
        </div>
    </div>

    <div class="lapor row border mt-5 p-5 bg-light justify-content-center">
        <div class="col-12 mb-3">
            <h2>Laporan Masuk</h2>
        </div>

        <div class="col-12 mb-3">
            <input type="text" class="form-control" placeholder="Cari nama gedung atau ID">
        </div>

        <div class="row">

            <div class="col d-flex flex-column align-items-center bg-primary">
                <h4><?= $total ?></h4>
                <p>Laporan Masuk</p>
            </div>

            <div class="col d-flex flex-column align-items-center bg-accent">
                <h4><?= $baru ?></h4>
                <p>Laporan Masuk</p>
            </div>

            <div class="col d-flex flex-column align-items-center">
                <h4>4</h4>
                <p>Laporan Masuk</p>
            </div>

            <div class="col d-flex flex-column align-items-center">
                <h4>3</h4>
                <p>Lapoean masuk</p>
            </div>

            <div class="col d-flex flex-column align-items-center">
                <h4>3</h4>
                <p>Laporan masuk</p>
            </div>

        </div>
    </div>
</div>


<!-- <nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan (<?= $baru ?> baru)</a>
</nav>
<?= $this->endSection() ?>