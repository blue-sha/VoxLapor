<?php
/**
 * @var string $full_name
 * @var string $email
 * @var string $foto
 */
?>
<a href="<?= base_url('/') ?>"><button type="button">Kembali</button></a>
<h2>Profil</h2>

<div class="profil1">
<img src="<?= esc($foto) ?>" width="150" height="150" style="border-radius:50%; object-fit:cover;" alt="Foto profil">
<p><b>Nama:</b> <?= esc($full_name) ?></p>
<p><b>Email:</b> <?= esc($email) ?></p>
</div>