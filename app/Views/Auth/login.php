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
		background: rgba(34, 24, 118, 0.7);
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
					<h2 class="card-header"><?=lang('Auth.loginTitle')?></h2>
					<div class="card-body">

						<?= view('Myth\Auth\Views\_message_block') ?>

						<form action="<?= url_to('login') ?>" method="post">
							<?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
							<div class="form-group">
								<label for="login"><?=lang('Auth.email')?></label>
								<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
									   name="login" placeholder="<?=lang('Auth.email')?>">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
<?php else: ?>
							<div class="form-group">
								<label for="login"><?=lang('Auth.emailOrUsername')?></label>
								<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
									   name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
<?php endif; ?>

							<div class="form-group">
								<label for="password"><?=lang('Auth.password')?></label>
								<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
								<div class="invalid-feedback">
									<?= session('errors.password') ?>
								</div>
							</div>

<?php if ($config->allowRemembering): ?>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
									<?=lang('Auth.rememberMe')?>
								</label>
							</div>
<?php endif; ?>

							<br>
							<div class="g-recaptcha mb-3" data-sitekey="<?= env('RECAPTCHA_SITEKEY') ?>"></div>
							
							<button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
						</form>
						<script src="https://www.google.com/recaptcha/api.js" async defer></script>

						<hr>

<?php if ($config->allowRegistration) : ?>
						<p><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
<?php if ($config->activeResetter): ?>
						<p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>