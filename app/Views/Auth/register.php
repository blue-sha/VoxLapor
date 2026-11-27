<?php /** @var \Config\Auth $config */ ?>

<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
	html,
	body {
		overflow-x: hidden;
	}

	.vox-login-bg {
		position: fixed;
		top: 0;
		left: 0;
		width: 100vw;
		height: 100vh;
		background-image:
			linear-gradient(rgba(18, 14, 48, 0.45), rgba(18, 14, 48, 0.55)),
			url('<?= base_url('assets/bg-gedung.jpg') ?>');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		z-index: 0;
		pointer-events: none;
	}

	.vox-login-wrapper {
		position: relative;
		z-index: 1;
		min-height: calc(100vh - 56px);
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 32px 15px;
	}

	.vox-login-card {
		background: rgba(34, 24, 118, 0.88);
		backdrop-filter: blur(4px);
		-webkit-backdrop-filter: blur(4px);
		border: none;
		border-radius: 36px;
		color: #ffffff;
		box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
		overflow: hidden;
	}

	.vox-login-card .card-header {
		background: transparent;
		border-bottom: none;
		color: #ffffff;
		text-align: center;
		padding-top: 28px;
		padding-bottom: 8px;
		font-weight: 700;
	}

	.vox-login-card .card-body {
		padding: 18px 34px 32px;
	}

	.vox-login-card label,
	.vox-login-card .form-check-label {
		color: #f3f2ff;
	}

	.vox-login-card a {
		color: #d8d4ff;
	}

	.vox-login-card a:hover {
		color: #ffffff;
	}
</style>

<div class="vox-login-bg"></div>

<div class="vox-login-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">

                <div class="card vox-login-card">
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
</div>

<?= $this->endSection() ?>