<?php /** @var \Config\Auth $config */ ?>

<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <h2 class="card-header"><?=lang('Auth.register')?></h2>
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Untuk menyetting label Email -->
                        <div class="form-group">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                        </div>

                       <!--  Untuk menyetting label Username -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Username" value="<?= old('username') ?>">
                        </div>

                        <!-- Untuk menyetting label Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" placeholder="Nama" value="<?= old('nama') ?>">
                        </div>

                        <!-- Untuk menyetting label Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                        </div>

                        <!-- Untuk menyetting label Confirm Password -->
                        <div class="form-group">
                            <label for="pass_confirm">Confirm Password</label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>


                    <hr>

                    <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
