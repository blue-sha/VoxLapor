<?php

/**
 * @var String $nama
 */
?>

<?= $this->extend('layout/main') ?>
<?= $this->section('styles') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-2">
            <a href="<?= site_url('/') ?>">
                <img src="<?= base_url('img/Polban.png') ?>" width="50" height="50" alt="Logo Politeknik Negeri Bandung">
            </a>
            <a class="nav-link d-flex flex-column" href="<?= site_url('/') ?>">
                <p class="mb-0 nama-kampus">Politeknik Negri Bandung</p>
                <h6 class="mb-0 nama-aplikasi">VoxLaporan</h6>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fs-4 gap-md-5">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('lapor') ?>">Lapor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto gap-3">
                <?php if (service('authentication')->check()): ?>
                    <li class="nav-item border rounded-3">
                        <a href="<?= url_to('logout') ?>" class="btn btn-primary">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item border rounded-3">
                        <a href="<?= site_url('arah') ?>" class="btn btn-secondary">Masuk</a>
                    </li>
                    <li class="nav-item border rounded-3">
                        <a href="<?= site_url('register') ?>" class="btn btn-primary text-decoration-none">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

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

<div class="container border rounded-5 bg-light p-5 mb-5" id="content-2">

    <div class="row d-flex justify-content-center g-5 p-5">
        <div class="col-12">
            <h1 class="text-center">Exspor Dokument</h1>
        </div>
        <div class="col d-flex align-items-center">
            <img
                class="content-illustration"
                src="<?= base_url('img/formulir-1.svg') ?>"
                alt="Formulir Laporan hal 1">

            <div class=" d-flex flex-column align-items-center " style="width: 12rem;">

                <!-- Tombol Export -->
                <button type="button" class="btn text-white px-4 py-2 rounded-2 fw-semibold d-flex align-items-center justify-content-center gap-2 w-100 shadow-sm" style="background-color: #1304E3; font-size: 16px;">
                    <i class="bi bi-file-earmark-text fs-5"></i>
                    <span>Export</span>
                </button>

                <!-- Tombol / Dropdown Pilih File -->
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary bg-white text-muted rounded-pill px-4 py-2 w-100 d-flex justify-content-between align-items-center shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: #ced4da; font-size: 14px;">
                        <span>Pilih File</span>
                        <i class="bi bi-chevron-down fs-6"></i>
                    </button>
                    <!-- Menu dropdown (opsional untuk tampilan awal) -->
                    <ul class="dropdown-menu w-100">
                        <li><a class="dropdown-item" href="#">PDF</a></li>
                        <li><a class="dropdown-item" href="#">Excel (XLSX)</a></li>
                        <li><a class="dropdown-item" href="#">CSV</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col">
            <div class="card border shadow-sm overflow-hidden">
                <!-- Header Card -->
                <div class="card-header text-white py-3" style="background-color: #07277A;">
                    <h5 class="card-title m-0 fw-bold">Daftar Laporan selesai</h5>
                </div>

                <!-- Tabel di dalam Card Body / Tanpa Body agar tabel pas memenuhi card -->
                <div class="table-responsive m-0">
                    <table class="table  table-striped table-hover m-0 align-middle" style="background-color: #050A5D;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.1)">
                                <th class="py-3 ps-4 bg-transparent text-white">Nomor Pengaduan</th>
                                <th class="py-3 bg-transparent text-white">Pelapor</th>
                                <th class="py-3 bg-transparent text-white">Lokasi</th>
                                <th class="py-3 bg-transparent text-white">Objek</th>
                                <th class="py-3 bg-transparent text-white">Status</th>
                                <th class="py-3 pe-4 bg-transparent text-white text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                                <td class="py-3 ps-4 bg-transparent text-white">LAP-202611-0001</td>
                                <td class="py-3 bg-transparent text-white">Ahmad Sumbul</td>
                                <td class="py-3 bg-transparent text-white">P2T / UPA TIK</td>
                                <td class="py-3 bg-transparent text-white">Komputer</td>
                                <td class="py-3 bg-transparent text-white">Selesai</td>
                                <td class="py-3 pe-4 bg-transparent text-white text-end">
                                    <a href="#" class="fw-bold text-white text-decoration-none">Export</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 ps-4 bg-transparent text-white">LAP-202611-0002</td>
                                <td class="py-3 bg-transparent text-white">Rika Rinka</td>
                                <td class="py-3 bg-transparent text-white">P2T / UPA TIK</td>
                                <td class="py-3 bg-transparent text-white">Toilet</td>
                                <td class="py-3 bg-transparent text-white">Selesai</td>
                                <td class="py-3 pe-4 bg-transparent text-white text-end">
                                    <a href="#" class="fw-bold text-white text-decoration-none">Export</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>