<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- content  2 -->
    <div class="container-fluid border rounded-top-5 bg-light" id="content-2">
        <div class="row align-items-center g-4 p-5">
            <div class="col-12 col-lg-7">
                <h1 class="text-primary">Laporan Keluhan Pengaduan Sarana Prasarana</h1>
                <p class="content-deskripsi">
                    VoxLapor adalah layanan pengaduan resmi bagi seluruh sivitas akademika Politeknik Negeri Bandung untuk menyampaikan keluhan terkait sarana dan prasarana kampus. Mulai dari ruang kelas, laboratorium, jaringan internet, toilet, hingga fasilitas umum lainnya, setiap laporan Anda akan kami catat dan tindak lanjuti agar lingkungan belajar semakin nyaman dan layak.
                </p>
                <p class="content-deskripsi mb-0">
                    Cukup isi formulir pengaduan dengan menjelaskan lokasi, jenis kerusakan, dan waktu kejadian, lalu lampirkan foto pendukung bila ada. Laporan akan diverifikasi oleh bagian terkait dan statusnya dapat Anda pantau kapan saja melalui akun VoxLapor. Suara Anda sangat berarti bagi perbaikan fasilitas kampus kita bersama.
                </p>
                <a href="<?= base_url('user/lapor') ?>" class="btn btn-primary my-3">Lapor</a>
            </div>
            <div class="col-12 col-lg-5">
                <img
                    class="content-illustration"
                    src="<?= base_url('img/formulir-1.svg') ?>"
                    alt="Formulir Laporan hal 1">
            </div>
        </div>
    </div>
<?= $this->endSection() ?>