<?= $this->extend('layout/main') ?>
<?= $this->section('styles') ?>
<style>
    .table .action-column {
        width: 1%;
        white-space: nowrap;
    }

    #subTabel th {
        background-color: #5F63A2;
        color: #fff;
    }

    .table-title {
        background-color: #07277A;
        color: #fff;
        margin-bottom: 0;
    }

    .btn-bulan {
            border: 1px solid #dee2e6;
            background-color: #ffffff;
            color: #0d235c;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .btn-bulan:hover {
            border-color: #0d235c;
            background-color: #f8f9fa;
        }
        .btn-bulan.active {
            background-color: #0d235c !important;
            color: white !important;
            border-color: #0d235c !important;
        }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
/**
 * @var int $total
 * @var int $baru
 * @var int $bulanAktif
 * @var int $tahunAktif
 * @var int $jumlahBulanan
 * @var string $namaBulanAktif
 * @var array<int, string> $daftarBulan
 * @var array<int, array{label: string, count: int, percentage: int, color: string}> $kategoriLaporan
 * @var string $urlBulanSebelumnya
 * @var string $urlBulanBerikutnya
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

<div class="container mt-4">
    <div class="judul row flex-column">
        <div class="col  d-flex flex-column align-items-center">
            <h2>Dashboard Petugas</h2>
            <h6>kelola laporan, melakukan verifikasi, dan tindak lanjut</h6>
        </div>
    </div>

    <div class="lapor row border mt-5 p-3 bg-light justify-content-center rounded-5 border-3 mb-5">
        <div class="col-12 mb-3">
            <h2>Laporan Masuk</h2>
        </div>

        <div class="col-10 mb-4 d-flex justify-content-center">
            <input type="text" class="form-control" placeholder="Cari nama gedung atau ID">
        </div>

        <div class="row justify-content-center text-light pb-3 gap-3">

            <div class="Lp col-2 d-flex flex-column rounded-3 pt-3 pb-3" style="background-color: #072675;">
                <h4><?= $total ?></h4>
                <p>Laporan Masuk</p>
            </div>

            <div class="PS col-2 d-flex flex-column rounded-3 pt-3 pb-3" style="background-color: #542EBA;">
                <h4><?= $baru ?></h4>
                <p>Proses</p>
            </div>

            <div class="TL col-2 d-flex flex-column rounded-3 pt-3 pb-3" style="background-color: #FD8301;">
                <h4>0</h4>
                <p>Tindak Lanjut</p>
            </div>

            <div class="SI col-2 d-flex flex-column rounded-3 pt-3 pb-3" style="background-color: #3F8968;">
                <h4>0</h4>
                <p>Selesai</p>
            </div>

            <div class="DT col-2 d-flex flex-column rounded-3 pt-3 pb-3" style="background-color: #B62624;">
                <h4>0</h4>
                <p>Ditolak</p>
            </div>
        </div>
    </div>
</div>

<div class="container border rounded-5 overflow-auto px-0">
    <h2 class="table-title p-4">Daftar Lapor/Keluh</h2>
    <table class="table w-100">
        <thead>
            <tr id="subTabel">
                <th scope="col-3" class="px-5 py-3">Nomor</th>
                <th scope="col-3" class="px-5 py-3">Pelapor</th>
                <th scope="col-3" class="px-5 py-3">Objek</th>
                <th scope="col-3" class="px-5 py-3">Status</th>
                <th scope="col" class="action-column px-5 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="px-5">LAP0202611-0001</th>
                <td class="px-5">koenigsegg</td>
                <td class="px-5">carbon</td>
                <td class="px-5">Diproses</td>
                <td class="action-column px-5">
                    <button class="btn btn-success">approve</button>
                    <button class="btn btn-danger">Reject</button>
                    <button class="btn btn-light">Detail</button>
                </td>
            </tr>
            <tr>
                <th scope="row" class="px-5">LAP0202611-0002</th>
                <td class="px-5">Ferrari</td>
                <td class="px-5">Winglet</td>
                <td class="px-5">Diproses</td>
                <td class="action-column px-5">
                    <button class="btn btn-success">approve</button>
                    <button class="btn btn-danger">Reject</button>
                    <button class="btn btn-light">Detail</button>
                </td>
            </tr>
            <tr>
                <th scope="row" class="px-5">LAP0202611-0003</th>
                <td class="px-5">Buggati</td>
                <td class="px-5">body</td>
                <td class="px-5">Diproses</td>
                <td class="action-column px-5">
                    <button class="btn btn-success">approve</button>
                    <button class="btn btn-danger">Reject</button>
                    <button class="btn btn-light">Detail</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- <nav>
    <a href="<?= base_url('petugas') ?>">Dashboard</a> |
    <a href="<?= base_url('petugas/keluhan') ?>">Keluhan (<?= $baru ?> baru)</a>
</nav> -->

<div class="container mt-5">
    <div class="row g-4 align-items-start">
        <div class="col-lg-7">
        <!-- Card Utama -->
        <div class="card border shadow-sm">
            <!-- Header Card dengan Background Biru Gelap -->
            <div class="card-header text-white py-3" style="background-color: #0d235c;">
                <h5 class="card-title m-0 fw-bold">Kategori Laporan</h5>
            </div>
            
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Kolom untuk Grafik Donut -->
                    <div class="col-md-6 text-center position-relative mb-4 mb-md-0">
                        <div style="width: 200px; margin: 0 auto; position: relative;">
                            <canvas id="donutChart"></canvas>
                            <!-- Teks di Tengah Donut -->
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                <h3 class="fw-bold m-0" style="color: #111;"><?= number_format($jumlahBulanan) ?></h3>
                                <small class="text-muted fw-bold" style="font-size: 11px; letter-spacing: 1px;">TOTAL</small>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom untuk Legenda / Keterangan -->
                    <div class="col-md-6">
                        <ul class="list-unstyled m-0">
                            <?php if ($kategoriLaporan): ?>
                                <?php foreach ($kategoriLaporan as $kategori): ?>
                                    <li class="d-flex align-items-center mb-2">
                                        <span class="rounded-circle d-inline-block me-2" style="width: 14px; height: 14px; background-color: <?= esc($kategori['color']) ?>;"></span>
                                        <span class="fw-semibold" style="font-size: 14px;"><?= esc($kategori['label']) ?> <?= $kategori['percentage'] ?>% <span class="text-muted">(<?= number_format($kategori['count']) ?>)</span></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="text-muted">Belum ada laporan pada bulan ini.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="col-lg-5">
    <!-- Card Statistik Bulanan -->
<div class="card border shadow-sm h-100">
    <!-- Header Card dengan Background Biru Tua dan Badge Tahun -->
    <div class="card-header text-white py-3 d-flex justify-content-between align-items-center" style="background-color: #0d235c;">
        <h5 class="card-title m-0 fw-bold">Statistik bulanan</h5>
        <div class="d-flex align-items-center gap-2">
            <a class="btn btn-sm btn-outline-light" href="<?= esc($urlBulanSebelumnya) ?>" aria-label="Bulan sebelumnya">&laquo;</a>
            <span class="badge bg-transparent border text-white px-3 py-2 rounded-pill" style="font-size: 14px;"><?= esc($namaBulanAktif) ?> <?= esc((string) $tahunAktif) ?></span>
            <a class="btn btn-sm btn-outline-light" href="<?= esc($urlBulanBerikutnya) ?>" aria-label="Bulan berikutnya">&raquo;</a>
        </div>
    </div>
    
    <div class="card-body p-4">
        <div class="row g-3">
            <?php foreach ($daftarBulan as $nomorBulan => $namaBulan): ?>
                <?php
                $urlPilihBulan = site_url('petugas') . '?' . http_build_query([
                    'bulan' => $nomorBulan,
                    'tahun' => $tahunAktif,
                ]);
                $bulanTerpilih = $nomorBulan === $bulanAktif;
                ?>
                <div class="col-3">
                    <a class="btn btn-bulan w-100 py-2 <?= $bulanTerpilih ? 'active' : '' ?>"
                       href="<?= esc($urlPilihBulan) ?>"
                       <?= $bulanTerpilih ? 'aria-current="true"' : '' ?>>
                        <?= esc($namaBulan) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="text-muted text-center mt-4 mb-0">
            <?= number_format($jumlahBulanan) ?> laporan pada <?= esc($namaBulanAktif) ?> <?= esc((string) $tahunAktif) ?>
        </p>
    </div>
</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_column($kategoriLaporan, 'label'), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>,
            datasets: [{
                data: <?= json_encode(array_column($kategoriLaporan, 'count'), JSON_NUMERIC_CHECK) ?>,
                backgroundColor: <?= json_encode(array_column($kategoriLaporan, 'color'), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            },
            cutout: '70%'
        }
    });
</script>
<?= $this->endSection() ?>