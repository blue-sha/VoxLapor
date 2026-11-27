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
                    <a class="nav-link" href="<?= base_url('arah') ?>">Lapor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Petugas</a>
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