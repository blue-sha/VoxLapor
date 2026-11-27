<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'VoxLapor') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/b`ootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        html::-webkit-scrollbar {
            display: none;
        }

        body {
            min-height: 100vh;
            -ms-overflow-style: none;
            background-color: #F0F4F8;
        }

        .navbar .nav-link {
            color: blue;
        }

        .navbar .nama-kampus {
            font-size: .65rem;
        }

        .navbar .nama-aplikasi {
            font-size: 1.30rem;
            line-height: 0.70rem;
            font-weight: 700;
        }

        /* dashboar css */
        .sambutan-hero {
            background-image:
                linear-gradient(rgba(19, 4, 227, 0.7), rgba(19, 4, 227, 0.7)),
                url("<?= base_url('img/sambutan-background.jpeg') ?>");
            background-position: center, center;
            background-size: cover, 100% 100%;
            background-repeat: no-repeat, no-repeat;
            background-attachment: scroll, scroll;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .sambutan-hero .row {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        @media (max-width: 575.98px) {
            .sambutan-hero .row {
                padding: 2rem 1rem !important;
            }

            .sambutan-hero .display-4 {
                font-size: 2rem;
                line-height: 1.2;
            }

            .sambutan-hero .lead {
                font-size: 1rem;
            }
        }

        #content-2 {
            position: relative;
            margin-top: -2rem;
        }

        #content-2 .content-deskripsi {
            text-align: justify;
        }

        .content-illustration {
            width: 100%;
            height: 25rem;
            object-fit: contain;
            border-radius: 1rem;
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>

<body>
    <?php if (empty($hideNavbar)): ?>
        <?= $this->include('layout/header') ?>
    <?php endif ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?php if (empty($hideFooter)): ?>
        <?= $this->include('layout/footer') ?>
    <?php endif ?>
</body>

</html>